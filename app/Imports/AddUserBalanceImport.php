<?php

namespace App\Imports;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Notification; // Fixed typo from Notifcation
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AddUserBalanceImport implements ToCollection, WithHeadingRow, WithStartRow, WithChunkReading
{
    private $successCount = 0;
    private $errorCount = 0;
    private $errors = [];

    public function __construct()
    {
        ini_set('max_execution_time', 300); // 5 minutes
        ini_set('memory_limit', '512M');
    }

    public function collection(Collection $collection)
    {
        $admin = User::findOrFail(\Company::Account_id);
        $app_name = config('app.professional_name');

        Log::info("Starting bulk upload processing for " . count($collection) . " rows.");

        foreach ($collection as $index => $row) {

            Log::info("Processing row Data: " . json_encode($row));

            $rowNumber = $index + 2; // Start row is 2

            // Skip empty rows and instruction/example rows
            if (empty($row['user_account']) ||
                $this->isInstructionRow($row['user_account'])) {
                Log::info("Skipping row at line {$rowNumber}");
                continue;
            }

            try {
                $this->processRow($row, $rowNumber, $admin, $app_name);
                $this->successCount++;
            } catch (\Exception $e) {
                $this->errorCount++;
                $this->errors[] = "Row {$rowNumber}: " . $e->getMessage();
                Log::error("Error processing row {$rowNumber}: " . $e->getMessage());
                // Continue processing other rows instead of throwing
                continue;
            }
        }

        // Log summary
        Log::info("Bulk upload completed. Success: {$this->successCount}, Errors: {$this->errorCount}");

        if ($this->errorCount > 0 && $this->successCount === 0) {
            throw new \Exception("All rows failed. Errors: " . implode("; ", $this->errors));
        }
    }

    private function isInstructionRow($userAccount)
    {
        $userAccount = trim(strtoupper((string)$userAccount));
        return str_starts_with($userAccount, 'INSTRUCTION') ||
               str_starts_with($userAccount, '---') ||
               $userAccount === '1001'; // Example row
    }

    private function processRow($row, $rowNumber, $admin, $app_name)
    {
        $user_id = (int)$row['user_account'];
        Log::info("Processing row {$rowNumber} for User ID: {$user_id}");
        $user = User::find($user_id);

        if (!$user) {
            throw new \Exception("User with Account Number {$user_id} not found.");
        }

        // Extract and validate values
        $add_balance = $this->parseNumeric($row['add_balance'] ?? null);
        $payment_type = $this->parseString($row['payment_type'] ?? null);
        
        // Get reference number - handle comma-separated header "Transaction No, Card Number, Check No"
        // Laravel Excel will convert this to snake_case, so check multiple possible keys
        $reference_number = $this->parseString($row['reference_number'] ?? 
                                                $row['transaction_no_card_number_check_no'] ?? 
                                                $row['transaction no, card number, check no'] ?? null);
        
        $registration_fee_amount = $this->parseNumeric($row['registration_fee_amount'] ?? null);
        $deduct_maintenance_type = $this->parseString($row['deduct_maintenance_type'] ?? null);
        $maintenance_fee_value = $this->parseNumeric($row['maintenance_fee_value'] ?? null);
        $date_of_trans_value = $row['date_of_transaction'] ?? null;
        $send_remaining = strtolower($this->parseString($row['send_remaining_amount_to_credit_card'] ?? 'no'));

        // Determine actions
        $has_add_balance = $add_balance > 0;
        $has_maintenance_fee = !empty($deduct_maintenance_type) && $maintenance_fee_value > 0;
        $has_registration_fee = $registration_fee_amount > 0;
        $has_transfer_remaining = $send_remaining === 'yes';

        // Validation
        $this->validateRow(
            $user,
            $add_balance,
            $payment_type,
            $reference_number,
            $deduct_maintenance_type,
            $maintenance_fee_value,
            $registration_fee_amount,
            $date_of_trans_value,
            $has_add_balance,
            $has_maintenance_fee,
            $has_transfer_remaining
        );

        // Check for one-time enrollment fee (must not have previous EnrollmentFee)
        if ($has_registration_fee) {
            $alreadyPaid = $user->transactions()
                ->where('type', Transaction::EnrollmentFee)
                ->exists();

            if ($alreadyPaid) {
                throw new \Exception("One-time Enrollment fee is already charged for {$user->name}.");
            }
        }

        DB::beginTransaction();
        try {
            // Parse date (matching single user logic)
            $date_of_trans = $this->parseDate($date_of_trans_value, $has_add_balance);

            // Calculate maintenance fee (matching single user add_balance logic)
            $maintenance_fee_amount = 0;
            if ($has_maintenance_fee) {
                if ($deduct_maintenance_type === 'percentage' && $add_balance > 0) {
                    // Percentage of deposit
                    $maintenance_fee_amount = $add_balance * ($maintenance_fee_value / 100);
                } else {
                    // Fixed amount
                    $maintenance_fee_amount = $maintenance_fee_value;
                }
            }

            $deposit_amount = $add_balance;
            $remaining_amount = $deposit_amount;
            $transactionDate = $date_of_trans ? Carbon::parse($date_of_trans)->format('m/d/Y') : null;

            // Check user status (matching single user logic)
            if ($user->account_status !== "Approved") {
                throw new \Exception("User {$user->name}'s profile is not approved.");
            }

            // Check balance requirements (matching single user logic)
            $current_user_balance = userBalance($user->id);

            // Check maintenance fee balance
            if ($current_user_balance + $deposit_amount < $maintenance_fee_amount) {
                throw new \Exception("{$user->name}'s balance is insufficient to charge Maintenance fee.");
            }

            // Check registration fee balance (total deduction)
            if ($has_registration_fee) {
                $total_deduction = $maintenance_fee_amount + $registration_fee_amount;
                if ($total_deduction > $current_user_balance + $deposit_amount) {
                    throw new \Exception("{$user->name}'s balance is insufficient to charge Enrollment fee.");
                }
            }

            // Map payment type to display format (matching single user logic)
            $payment_type_display = $this->getPaymentTypeDisplay($payment_type);

            // Create transactions
            $deposit_transaction = null;
            $maintenance_transaction = null;
            $registration_transaction = null;

            // 1. Add Balance (Deposit) - matching single user logic
            if ($has_add_balance && $deposit_amount > 0) {
                $reference_id = generateTransactionId();
                $description = "Deposit of \${$deposit_amount} made via {$payment_type_display} on {$transactionDate}. Transaction ID: #{$reference_number}.";
                $customer_description = "\${$deposit_amount} added in account on {$transactionDate} against {$payment_type_display} Transaction ID: #{$reference_number}.";

                $admin->transactions()->create([
                    "debit" => $deposit_amount,
                    "description" => $description,
                    "type" => Transaction::Deposit,
                    "reference_id" => $reference_id,
                    "date_of_trans" => $date_of_trans,
                ]);

                $deposit_transaction = $user->transactions()->create([
                    "reference_id" => $reference_id,
                    "credit" => $deposit_amount,
                    "description" => $customer_description,
                    "type" => Transaction::Deposit,
                    "date_of_trans" => $date_of_trans,
                ]);
            }

            // 2. Maintenance Fee - matching single user logic
            if ($has_maintenance_fee && $maintenance_fee_amount > 0) {
                $reference_id = generateTransactionId();
                $platform_fee_description = "Maintenance fee of \${$maintenance_fee_amount} has been charged.";
                $customer_platform_fee_description = "Maintenance fee of \${$maintenance_fee_amount} deducted.";

                $maintenance_transaction = $user->transactions()->create([
                    "reference_id" => $reference_id,
                    "debit" => $maintenance_fee_amount,
                    "type" => Transaction::MaintenanceFee,
                    "description" => $customer_platform_fee_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans" => $date_of_trans,
                ]);

                $admin->transactions()->create([
                    "reference_id" => $reference_id,
                    "credit" => $maintenance_fee_amount,
                    "type" => Transaction::MaintenanceFee,
                    "description" => $platform_fee_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans" => $date_of_trans,
                ]);

                $remaining_amount -= $maintenance_fee_amount;
            }

            // 3. Registration Fee - matching single user logic
            if ($has_registration_fee && $registration_fee_amount > 0) {
                $reference_id = generateTransactionId();
                $registration_fee_description = "A one-time enrollment fee of \${$registration_fee_amount} has been charged.";
                $customer_registration_description = "A one-time Enrollment fee of \${$registration_fee_amount} deducted.";

                $registration_transaction = $user->transactions()->create([
                    "reference_id" => $reference_id,
                    "type" => Transaction::EnrollmentFee,
                    "debit" => $registration_fee_amount,
                    "description" => $customer_registration_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans" => $date_of_trans,
                ]);

                $admin->transactions()->create([
                    "reference_id" => $reference_id,
                    "type" => Transaction::EnrollmentFee,
                    "credit" => $registration_fee_amount,
                    "description" => $registration_fee_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans" => $date_of_trans,
                ]);

                $remaining_amount -= $registration_fee_amount;
            }

            // 4. Credit Card Transfer - matching single user logic
            if ($has_transfer_remaining && $remaining_amount > 0) {
                $reference_id = generateTransactionId();
                $amount_credited_description = "Amount \${$remaining_amount} is transferred in customer's credit card.";
                $customer_amount_debited_description = "Amount \${$remaining_amount} is received in credit card.";

                $user->transactions()->create([
                    "reference_id" => $reference_id,
                    "type" => Transaction::CreditCard,
                    "debit" => $remaining_amount,
                    "description" => $customer_amount_debited_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans" => $date_of_trans,
                ]);

                $admin->transactions()->create([
                    "reference_id" => $reference_id,
                    "type" => Transaction::CreditCard,
                    "credit" => $remaining_amount,
                    "description" => $amount_credited_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans" => $date_of_trans,
                ]);
            }

            // Generate PDF (VOD) - matching single user logic
            $this->generateVOD($user, $deposit_transaction, $registration_transaction, $maintenance_transaction);

            // Create notification
            // Notification::create([
            //     "status" => 0,
            //     "user_id" => $user->id,
            //     "title" => 'Balance Added',
            //     "name" => "{$user->name} {$user->last_name}",
            //     "description" => $deposit_amount > 0
            //         ? "Your {$app_name} account has been topped up successfully with amount \${$deposit_amount}"
            //         : "Your {$app_name} account has been updated with bulk upload actions.",
            // ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function validateRow(
        $user,
        $add_balance,
        $payment_type,
        $reference_number,
        $deduct_maintenance_type,
        $maintenance_fee_value,
        $registration_fee_amount,
        $date_of_trans_value,
        $has_add_balance,
        $has_maintenance_fee,
        $has_transfer_remaining
    ) {
        // Validation: If add_balance > 0, payment details are required
        if ($has_add_balance) {
            if (empty($payment_type)) {
                throw new \Exception("Payment Type is required when Add Balance is provided.");
            }
            if (!in_array(strtolower($payment_type), ['ach', 'card', 'check'])) {
                throw new \Exception("Payment Type must be 'ach', 'card', or 'check'.");
            }
            if (empty($reference_number)) {
                $refName = strtolower($payment_type) === 'ach' ? 'Transaction No.' :
                          (strtolower($payment_type) === 'check' ? 'Check No.' : 'Card No.');
                throw new \Exception("{$refName} (Reference Number) is required for {$payment_type} payment.");
            }
            if (empty($date_of_trans_value)) {
                throw new \Exception("Date of Transaction is required when Add Balance is provided.");
            }
        }

        // Validation: Maintenance fee requirements
        if (!empty($deduct_maintenance_type)) {
            if (!in_array($deduct_maintenance_type, ['percentage', 'fixed'])) {
                throw new \Exception("Deduct Maintenance Type must be 'percentage' or 'fixed'.");
            }
            if ($maintenance_fee_value <= 0) {
                throw new \Exception("Maintenance Fee Value is required when Deduct Maintenance Type is specified.");
            }
        }

        if ($maintenance_fee_value > 0 && empty($deduct_maintenance_type)) {
            throw new \Exception("Deduct Maintenance Type (percentage/fixed) is required when Maintenance Fee Value is provided.");
        }

        // Validation: Transfer Remaining only with Add Balance
        if ($has_transfer_remaining && !$has_add_balance) {
            throw new \Exception("'Send Remaining Amount to Credit Card' can only be used when Add Balance is provided.");
        }

        // Validation: Negative amounts
        if ($add_balance < 0 || $maintenance_fee_value < 0 || $registration_fee_amount < 0) {
            throw new \Exception("Amounts cannot be negative.");
        }
    }

    private function parseNumeric($value)
    {
        if ($value === null || $value === '') {
            return 0;
        }
        return is_numeric($value) ? (float)$value : 0;
    }

    private function parseString($value)
    {
        if ($value === null || $value === '') {
            return null;
        }
        return strtolower(trim((string)$value));
    }

    private function parseDate($date_value, $is_required)
    {
        if (empty($date_value)) {
            return $is_required ? date('Y-m-d') : null;
        }

        try {
            if (is_numeric($date_value)) {
                // Excel date number
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date_value)->format('Y-m-d');
            } else {
                // String date
                return Carbon::parse($date_value)->format('Y-m-d');
            }
        } catch (\Exception $e) {
            throw new \Exception("Invalid date format. Please use YYYY-MM-DD or Excel date.");
        }
    }

    private function getPaymentTypeDisplay($payment_type)
    {
        if (empty($payment_type)) {
            return 'N/A';
        }

        $payment_type = strtolower($payment_type);

        if ($payment_type === 'ach') {
            return 'ACH';
        } elseif ($payment_type === 'check') {
            return 'Check Payment';
        } elseif ($payment_type === 'card') {
            return 'Card';
        }

        return ucfirst($payment_type);
    }

    private function generateVOD($user, $deposit_transaction, $registration_transaction, $maintenance_transaction)
    {
        if (empty($deposit_transaction) && empty($registration_transaction)) {
            return;
        }

        $directory = public_path("storage/{$user->id}/vod_letters");
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        try {
            $pdf = PDF::loadView('document.trusted-surplus-pdf', [
                'user' => $user,
                "deposit_transaction" => $deposit_transaction,
                "registration_transaction" => $registration_transaction,
                "maintenance_transaction" => $maintenance_transaction,
            ])->setOption([
                'fontDir' => public_path('/fonts'),
                'fontCache' => public_path('/fonts'),
                'defaultFont' => 'Nominee-Black',
            ])->setPaper('A4', 'portrait');

            $file_name = 'VOD_' . $user->full_name() . "_" . date('F_Y_His') . ".pdf";
            $file_path = "$directory/$file_name";
            $pdf->save($file_path);

            if (file_exists($file_path)) {
                if (!empty($deposit_transaction)) {
                    $deposit_transaction->update(["vod_link" => $file_name]);
                }
                if (!empty($registration_transaction)) {
                    $registration_transaction->update(["vod_link" => $file_name]);
                }
            } else {
                Log::error("PDF generation failed: {$file_path}");
            }
        } catch (\Exception $e) {
            Log::error("PDF generation error: " . $e->getMessage());
            // Don't throw - PDF generation failure shouldn't stop the transaction
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function getSuccessCount()
    {
        return $this->successCount;
    }

    public function getErrorCount()
    {
        return $this->errorCount;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
