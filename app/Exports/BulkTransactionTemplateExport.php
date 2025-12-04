<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class BulkTransactionTemplateExport implements
    FromCollection,
    WithHeadings,
    WithEvents,
    WithMapping,
    ShouldAutoSize
{
    public function headings(): array
    {
        return [
            'User Account',                        // user id or account number
            'Name',
            'Current Balance',                      // Current user balance (informational)
            'Enrollment Fee Already Done',         // Enrollment fee status (informational)
            'Add Balance',
            'Payment Type',                        // ach, card, check
            'Reference Number',                    // depends on payment_type
            'Registration Fee Amount',
            'Deduct Maintenance Type',             // percentage / fixed
            'Maintenance Fee Value',               // amount or percentage
            'Date Of Transaction',
            'Send Remaining Amount To Credit Card' // Yes/No dropdown
        ];
    }

    private $balances = [];
    private $enrollmentFees = [];

    public function collection()
    {
        // Get all approved users
        $users = User::where('role', 'User')
            ->where('account_status', 'Approved')
            ->get();
        
        if ($users->isEmpty()) {
            return collect();
        }
        
        // Batch calculate all balances in a single query (much faster)
        $userIds = $users->pluck('id')->toArray();
        
        // Calculate balances for all users in one query
        $balances = Transaction::whereIn('user_id', $userIds)
            ->selectRaw('user_id, SUM(credit) as total_credit, SUM(debit) as total_debit')
            ->groupBy('user_id')
            ->get()
            ->keyBy('user_id');
        
        // Store balances in array for quick lookup
        foreach ($balances as $balance) {
            $this->balances[$balance->user_id] = (float)($balance->total_credit - $balance->total_debit);
        }
        
        // Set default balance for users with no transactions
        foreach ($userIds as $userId) {
            if (!isset($this->balances[$userId])) {
                $this->balances[$userId] = 0.0;
            }
        }
        
        // Batch check enrollment fees for all users in one query
        $enrollmentFeeUsers = Transaction::whereIn('user_id', $userIds)
            ->where('type', Transaction::EnrollmentFee)
            ->distinct()
            ->pluck('user_id')
            ->toArray();
        
        // Store enrollment fee status
        foreach ($enrollmentFeeUsers as $userId) {
            $this->enrollmentFees[$userId] = true;
        }
        
        return $users;
    }

    public function map($user): array
    {
        // Get current balance from pre-calculated array (no query needed)
        $current_balance = $this->balances[$user->id] ?? 0.0;
        
        // Check enrollment fee from pre-calculated array (no query needed)
        $enrollment_fee_done = isset($this->enrollmentFees[$user->id]);
        
        return [
            $user->id,                                    // user_account
            $user->full_name(),                          // name
            $current_balance,                             // current_balance (numeric value, Excel will format as currency)
            $enrollment_fee_done ? 'Yes' : 'No',         // enrollment_fee_already_done
            '',                                          // add_balance
            '',                                          // payment_type
            '',                                          // reference_number
            '',                                          // registration_fee_amount
            '',                                          // deduct_maintenance_type
            '',                                          // maintenance_fee_value
            '',                                          // date_of_transaction
            '',                                          // send_remaining_amount_to_credit_card
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                // Style header row with background color #559e99 and bold
                $headerRange = 'A1:' . $sheet->getHighestColumn() . '1';
                $sheet->getStyle($headerRange)->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                        'size' => 11,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '559e99'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Get actual row count for optimization
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();
                
                // Unlock all cells first using range (much faster than cell-by-cell)
                if ($highestRow > 1) {
                    // Unlock all data rows at once
                    $unlockRange = "A2:{$highestColumn}{$highestRow}";
                    $sheet->getStyle($unlockRange)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
                    
                    // Lock read-only columns: A, B, C, D (User Account, Name, Current Balance, Enrollment Fee)
                    // Note: Without sheet protection enabled, these cells won't be enforced as read-only,
                    // but they are visually distinct and pre-filled, so users typically won't need to edit them
                    $lockRangeA = "A2:A{$highestRow}";
                    $lockRangeB = "B2:B{$highestRow}";
                    $lockRangeC = "C2:C{$highestRow}";
                    $lockRangeD = "D2:D{$highestRow}";
                    
                    $sheet->getStyle($lockRangeA)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                    $sheet->getStyle($lockRangeB)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                    $sheet->getStyle($lockRangeC)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                    $sheet->getStyle($lockRangeD)->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);
                }
                
                // Do NOT enable sheet protection - this allows full editing of all cells
                // The locked cells (A, B, C, D) are marked but won't be enforced
                // Users can edit everything, but the informational columns are clearly marked as read-only
                // If you want to enforce protection, users can manually protect the sheet in Excel

                // Get actual highest row (much faster than processing 5000 rows)
                $actualHighestRow = $sheet->getHighestRow();
                $maxRows = min($actualHighestRow + 100, 5000); // Process actual rows + 100 buffer for future entries
                
                // Dropdown for payment_type: column F (not E - E is Add Balance!)
                $paymentTypeValidation = $sheet->getCell('F2')->getDataValidation();
                $paymentTypeValidation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                $paymentTypeValidation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
                $paymentTypeValidation->setAllowBlank(false);
                $paymentTypeValidation->setShowInputMessage(true);
                $paymentTypeValidation->setShowErrorMessage(true);
                $paymentTypeValidation->setShowDropDown(true);
                $paymentTypeValidation->setFormula1('"ach,card,check"');

                foreach (range(2, $maxRows) as $row) {
                    $sheet->getCell("F{$row}")->setDataValidation(clone $paymentTypeValidation);
                }

                // Dropdown for deduct_maintenance_type: column I (was G, now shifted)
                $maintenanceTypeValidation = $sheet->getCell('I2')->getDataValidation();
                $maintenanceTypeValidation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                $maintenanceTypeValidation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
                $maintenanceTypeValidation->setAllowBlank(true);
                $maintenanceTypeValidation->setShowInputMessage(true);
                $maintenanceTypeValidation->setShowErrorMessage(true);
                $maintenanceTypeValidation->setShowDropDown(true);
                $maintenanceTypeValidation->setFormula1('"percentage,fixed"');

                foreach (range(2, $maxRows) as $row) {
                    $sheet->getCell("I{$row}")->setDataValidation(clone $maintenanceTypeValidation);
                }

                // Dropdown for send_remaining_amount_to_credit_card: column L (was J, now shifted)
                $remainingAmountValidation = $sheet->getCell('L2')->getDataValidation();
                $remainingAmountValidation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                $remainingAmountValidation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
                $remainingAmountValidation->setAllowBlank(true);
                $remainingAmountValidation->setShowInputMessage(true);
                $remainingAmountValidation->setShowErrorMessage(true);
                $remainingAmountValidation->setShowDropDown(true);
                $remainingAmountValidation->setFormula1('"Yes,No"');

                foreach (range(2, $maxRows) as $row) {
                    $sheet->getCell("L{$row}")->setDataValidation(clone $remainingAmountValidation);
                }

                // Format date_of_transaction column (K) with date format
                // Excel 2013+ shows a calendar icon when you click on date-formatted cells
                $dateColumn = 'K';
                
                // Set date format for the entire column at once (faster)
                // Use US date format - Excel recognizes this and shows calendar picker in Excel 2013+
                if ($maxRows > 1) {
                    $dateStyle = $sheet->getStyle("{$dateColumn}2:{$dateColumn}{$maxRows}");
                    // Use format code that Excel recognizes as date type (m/d/yyyy or mm/dd/yyyy)
                    // This format triggers Excel's built-in calendar picker in Excel 2013+
                    $dateStyle->getNumberFormat()->setFormatCode('m/d/yyyy');
                }
                
                // Add data validation for date input
                // Note: Excel's calendar picker appears automatically when you click on date-formatted cells (Excel 2013+)
                // For older Excel versions, users can type dates manually
                foreach (range(2, $maxRows) as $row) {
                    $cell = $sheet->getCell("{$dateColumn}{$row}");
                    
                    // Set cell value type hint (helps Excel recognize it as a date)
                    // This is done by the number format above
                    
                    // Add data validation for date
                    $validation = $cell->getDataValidation();
                    $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_DATE);
                    $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
                    $validation->setAllowBlank(true);
                    $validation->setShowInputMessage(true);
                    $validation->setShowErrorMessage(true);
                    $validation->setErrorTitle('Invalid Date');
                    $validation->setError('Please enter a valid date. In Excel 2013+, click the cell to see a calendar icon. Or type date as M/D/YYYY (e.g., 12/25/2024).');
                    $validation->setPromptTitle('Date Selection');
                    $validation->setPrompt('Click this cell - a calendar icon appears in Excel 2013+. Or type date as M/D/YYYY (e.g., 12/25/2024).');
                    
                    // Set date range using Excel DATE function
                    $validation->setFormula1('DATE(1900,1,1)');
                    $validation->setFormula2('DATE(2100,12,31)');
                }
                
                // Format Current Balance column (C) as currency - use range for better performance
                if ($maxRows > 1) {
                    $sheet->getStyle("C2:C{$maxRows}")
                        ->getNumberFormat()
                        ->setFormatCode('$#,##0.00');
                }
                
                // Auto-size all columns and disable text wrapping (optimized)
                $highestColumn = $sheet->getHighestColumn();
                $highestRow = $sheet->getHighestRow();
                
                for ($col = 'A'; $col <= $highestColumn; $col++) {
                    // Auto-size column width
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
                
                // Disable text wrapping for all cells at once (much faster)
                if ($highestRow > 0) {
                    $allCellsRange = "A1:{$highestColumn}{$highestRow}";
                    $sheet->getStyle($allCellsRange)->getAlignment()->setWrapText(false);
                }
            }
        ];
    }
}
