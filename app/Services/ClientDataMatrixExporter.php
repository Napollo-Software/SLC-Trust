<?php

namespace App\Services;

use App\Exports\ArrayExport;
use App\Exports\BulkTransactionTemplateExport;
use App\Exports\PendingBillExport;
use App\Exports\PendingDepositExport;
use App\Exports\PendingEnrollmentExport;
use App\Exports\Users as DepositTemplateExport;
use App\Models\Claim;
use App\Models\Lead;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\User;
use App\Models\contacts;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Reusable exporter for the client data matrix (Excel / CSV / PDF).
 * Used by `php artisan export:client-data-matrix` and callable from other code.
 */
class ClientDataMatrixExporter
{
    protected string $outputPath;
    protected int $pdfRowLimit;
    protected array $manifest = [];
    /** @var array<int, string> excel|csv|pdf */
    protected array $formats = ['excel', 'csv', 'pdf'];
    /** Current area subfolder under output path (e.g. Bills) */
    protected ?string $currentAreaFolder = null;

    public function __construct(?string $outputPath = null, int $pdfRowLimit = 500, $formats = null)
    {
        $this->outputPath  = $outputPath ?: storage_path('app/client_data_exports');
        $this->pdfRowLimit = $pdfRowLimit;
        $this->formats     = $this->normalizeFormats($formats);
    }

    /**
     * @param  string|array<int, string>|null  $formats
     * @return array<int, string>
     */
    public function normalizeFormats($formats): array
    {
        if ($formats === null || $formats === '' || $formats === 'all') {
            return ['excel', 'csv', 'pdf'];
        }

        if (is_string($formats)) {
            $formats = preg_split('/[,\s|]+/', strtolower($formats), -1, PREG_SPLIT_NO_EMPTY) ?: [];
        }

        $normalized = [];
        foreach ((array) $formats as $format) {
            $format = strtolower(trim((string) $format));
            if ($format === 'all') {
                return ['excel', 'csv', 'pdf'];
            }
            if (in_array($format, ['excel', 'xlsx'], true)) {
                $normalized[] = 'excel';
            } elseif ($format === 'csv') {
                $normalized[] = 'csv';
            } elseif ($format === 'pdf') {
                $normalized[] = 'pdf';
            }
        }

        $normalized = array_values(array_unique($normalized));

        if (empty($normalized)) {
            throw new \InvalidArgumentException(
                'Invalid --format. Use: all, excel, csv, pdf, or combinations like excel,csv'
            );
        }

        return $normalized;
    }

    public function getFormats(): array
    {
        return $this->formats;
    }

    /**
     * Default folder names matching the export matrix areas.
     *
     * @return array<string, string>
     */
    public function areaFolders(): array
    {
        // "/" in matrix labels becomes " - " so folder names are Windows-safe.
        return [
            'customers' => 'Customers - Accounts',
            'bills'     => 'Bills',
            'finance'   => 'Transactions - Financial',
            'reports'   => 'Business Reports',
            'documents' => 'Documents (PDF packages)',
        ];
    }

    protected function setArea(string $step): void
    {
        $folders = $this->areaFolders();
        $this->currentAreaFolder = $folders[$step] ?? null;

        if ($this->currentAreaFolder) {
            File::ensureDirectoryExists(
                rtrim($this->outputPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $this->currentAreaFolder
            );
        }
    }

    /**
     * Prefix filename with current area folder (filesystem + Excel relative paths).
     */
    protected function pathInArea(string $filename): string
    {
        if (! $this->currentAreaFolder) {
            return $filename;
        }

        // Excel/Flysystem prefer forward slashes in relative keys
        return $this->currentAreaFolder . '/' . ltrim(str_replace('\\', '/', $filename), '/');
    }

    protected function wants(string $format): bool
    {
        return in_array($format, $this->formats, true);
    }

    public function getOutputPath(): string
    {
        return $this->outputPath;
    }

    public function getManifest(): array
    {
        return $this->manifest;
    }

    public function ensureOutputDirectory(): void
    {
        File::ensureDirectoryExists($this->outputPath);
        File::ensureDirectoryExists(storage_path('app/client_data_exports'));

        foreach ($this->areaFolders() as $folder) {
            File::ensureDirectoryExists(
                rtrim($this->outputPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $folder
            );
            File::ensureDirectoryExists(storage_path('app/client_data_exports/' . $folder));
        }
    }

    /**
     * @return array<int, string>
     */
    public function availableSteps(): array
    {
        return ['customers', 'bills', 'finance', 'reports', 'documents'];
    }

    public function runAll(): array
    {
        foreach ($this->availableSteps() as $step) {
            $this->runStep($step);
        }

        $this->writeReadme();

        return $this->manifest;
    }

    public function runStep(string $step): array
    {
        $this->ensureOutputDirectory();
        $this->setArea($step);

        switch ($step) {
            case 'customers':
                $this->exportCustomers();
                break;
            case 'bills':
                $this->exportBills();
                break;
            case 'finance':
                $this->exportFinance();
                break;
            case 'reports':
                $this->exportReports();
                break;
            case 'documents':
                $this->exportDocuments();
                break;
            default:
                throw new \InvalidArgumentException(
                    "Unknown step [{$step}]. Allowed: " . implode(', ', $this->availableSteps())
                );
        }

        return $this->manifest;
    }

    protected function exportCustomers(): void
    {
        // Match /all_users: everyone except Spatie role "vendor" (includes Admin, Moderator, Employee, User, etc.)
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'vendor');
        })
            ->orderBy('id')
            ->get();

        $customerRows = $users->map(function (User $user) {
            $isAdmin = strcasecmp((string) ($user->role ?? ''), 'Admin') === 0;
            $balance = $isAdmin
                ? ''
                : (function_exists('userBalance') ? userBalance($user->id) : ($user->user_balance ?? 0));

            return [
                'Account Number' => $user->id,
                'Name'           => trim(($user->name ?? '') . ' ' . ($user->last_name ?? '')),
                'Email'          => $user->email,
                'Role'           => $user->role,
                'Account Status' => $user->account_status,
                'Balance'        => ($balance === '' || $balance === null)
                    ? ''
                    : (is_numeric($balance) ? number_format((float) $balance, 2, '.', '') : $balance),
                'Billing Cycle'  => $user->billing_cycle_title,
                'Surplus Amount' => number_format((float) ($user->surplus_amount ?? 0), 2, '.', ''),
            ];
        });

        $headings = ['Account Number', 'Name', 'Email', 'Role', 'Account Status', 'Balance', 'Billing Cycle', 'Surplus Amount'];
        $this->storeExcel('01_customer_list.xlsx', $headings, $customerRows);
        $this->storeCsv('01_customer_list.csv', $headings, $customerRows);
        $this->storePdf('01_customer_list.pdf', 'Users / Accounts List', $headings, $customerRows);

        // Deposit/bulk templates stay Approved customers only (operational upload sheets)
        $this->storeMaatwebsite('02_deposit_template.xlsx', new DepositTemplateExport());
        $this->storeMaatwebsite('03_bulk_deposit_fee_template.xlsx', new BulkTransactionTemplateExport());
    }

    protected function exportBills(): void
    {
        $this->storeMaatwebsite('04_pending_bills.xlsx', new PendingBillExport());

        $bills    = Claim::with(['user', 'category', 'payee'])->orderByDesc('id')->get();
        $billRows = $this->mapBillRows($bills);

        $this->storeExcel('05_bills_list.xlsx', $this->billHeadings(), $billRows);
        $this->storeCsv('05_bills_list.csv', $this->billHeadings(), $billRows);
        $this->storePdf('05_bills_list.pdf', 'Bills List', $this->billHeadings(), $billRows);

        $deleted     = Claim::onlyTrashed()->with(['user', 'category', 'payee'])->orderByDesc('id')->get();
        $deletedRows = $this->mapBillRows($deleted, true);
        $deletedHeadings = array_merge($this->billHeadings(), ['Deleted At']);

        $this->storeExcel('06_deleted_bills.xlsx', $deletedHeadings, $deletedRows);
        $this->storeCsv('06_deleted_bills.csv', $deletedHeadings, $deletedRows);
        $this->storePdf('06_deleted_bills.pdf', 'Deleted Bills', $deletedHeadings, $deletedRows);

        $sample = Claim::with(['user', 'category', 'payee'])->orderByDesc('id')->first();
        if ($sample) {
            $simple = collect([$this->mapBillRows(collect([$sample]))->first()]);
            $this->storePdf('07_single_bill_sample.pdf', 'Single Bill Sample #' . $sample->id, $this->billHeadings(), $simple);
        } else {
            $this->manifest[] = [
                'file'    => '07_single_bill_sample.pdf',
                'status'  => 'skipped',
                'rows'    => 0,
                'message' => 'No bills found',
            ];
        }
    }

    protected function formatUsDate($date, bool $withTime = false): string
    {
        if (empty($date)) {
            return '';
        }

        try {
            $carbon = $date instanceof Carbon
                ? $date
                : Carbon::parse($date);
        } catch (\Throwable $e) {
            return (string) $date;
        }

        // e.g. July 6, 2026 or July 6, 2026 3:45 PM
        return $withTime
            ? $carbon->format('F j, Y g:i A')
            : $carbon->format('F j, Y');
    }

    protected function billHeadings(): array
    {
        return [
            'Bill/CID#',
            'Customer/User',
            'Date',
            'Category',
            'Status',
            'Payee',
            'Account',
            'Payment Method',
            'Payment Number',
            'Amount',
        ];
    }

    protected function mapBillRows(Collection $claims, bool $includeDeletedAt = false): Collection
    {
        return $claims->map(function (Claim $claim) use ($includeDeletedAt) {
            $user = $claim->user;
            $date = $claim->submission_date
                ? $this->formatUsDate($claim->submission_date)
                : $this->formatUsDate($claim->created_at);

            $row = [
                'Bill/CID#'       => $claim->id,
                'Customer/User'   => $user ? trim(($user->name ?? '') . ' ' . ($user->last_name ?? '')) : '',
                'Date'            => $date,
                'Category'        => $claim->category->category_name ?? '',
                'Status'          => $claim->claim_status,
                'Payee'           => $claim->payee->name ?? '',
                'Account'         => $claim->account_number ?? '',
                'Payment Method'  => $claim->payment_method ?? '',
                'Payment Number'  => $claim->card_number ?? '',
                'Amount'          => $claim->claim_amount,
            ];

            if ($includeDeletedAt) {
                $row['Deleted At'] = $this->formatUsDate($claim->deleted_at, true);
            }

            return $row;
        });
    }

    protected function exportFinance(): void
    {
        @ini_set('memory_limit', '2048M');

        $filteredHeadings = [
            'Transaction ID',
            'Name',
            'Description',
            'Type',
            'Credit',
            'Debit',
            'Amount',
            'Date',
        ];
        $filteredRows = collect();

        Transaction::with('user')->orderByDesc('id')->chunk(500, function ($chunk) use (&$filteredRows) {
            foreach ($chunk as $t) {
                $credit = (float) ($t->credit ?? 0);
                $debit  = (float) ($t->debit ?? 0);
                $type   = $this->creditDebitLabel($t);

                if ($type === '' && $credit > 0) {
                    $type = 'Credit';
                } elseif ($type === '' && $debit > 0) {
                    $type = 'Debit';
                }

                $amount = $credit > 0 ? $credit : ($debit > 0 ? $debit : (float) ($t->amount ?? 0));

                $filteredRows->push([
                    'Transaction ID' => $t->reference_id ?: ('TID# ' . $t->id),
                    'Name'           => trim(($t->user->name ?? $t->name ?? '') . ' ' . ($t->user->last_name ?? $t->last_name ?? '')),
                    'Description'    => $t->description,
                    'Type'           => $type,
                    'Credit'         => $credit > 0 ? number_format($credit, 2, '.', '') : '',
                    'Debit'          => $debit > 0 ? number_format($debit, 2, '.', '') : '',
                    'Amount'         => number_format($amount, 2, '.', ''),
                    'Date'           => $this->formatUsDate($t->created_at, true),
                ]);
            }
        });

        $this->storeExcel('08_filtered_transactions.xlsx', $filteredHeadings, $filteredRows);
        $this->storePdfSafely('08_filtered_transactions.pdf', 'Filtered Transactions', $filteredHeadings, $filteredRows);
        unset($filteredRows);

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth   = Carbon::now()->endOfMonth();
        $monthly      = Transaction::with('user')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->orderBy('user_id')
            ->orderBy('id')
            ->get();

        $monthlyHeadings = [
            'Customer Name',
            'Date',
            'Transaction IDs',
            'Type',
            'Credit',
            'Debit',
            'Amount',
            'Bills',
            'Deposits',
        ];
        $monthlyRows = $monthly->map(function (Transaction $t) {
            $credit = (float) ($t->credit ?? 0);
            $debit  = (float) ($t->debit ?? 0);
            $type   = $this->creditDebitLabel($t);

            if ($type === '' && $credit > 0) {
                $type = 'Credit';
            } elseif ($type === '' && $debit > 0) {
                $type = 'Debit';
            }

            $amount = $credit > 0 ? $credit : ($debit > 0 ? $debit : (float) ($t->amount ?? 0));

            return [
                'Customer Name'   => trim(($t->user->name ?? $t->name ?? '') . ' ' . ($t->user->last_name ?? $t->last_name ?? '')),
                'Date'            => $this->formatUsDate($t->created_at),
                'Transaction IDs' => $t->reference_id ?: ('TID# ' . $t->id),
                'Type'            => $type,
                'Credit'          => $credit > 0 ? number_format($credit, 2, '.', '') : '',
                'Debit'           => $debit > 0 ? number_format($debit, 2, '.', '') : '',
                'Amount'          => number_format($amount, 2, '.', ''),
                'Bills'           => $t->bill_id ? ('Bill# ' . $t->bill_id) : '',
                'Deposits'        => $t->type === Transaction::Deposit ? number_format($amount, 2, '.', '') : '',
            ];
        });

        $this->storeExcel('09_monthly_statement.xlsx', $monthlyHeadings, $monthlyRows);
        $this->storePdfSafely(
            '09_monthly_statement.pdf',
            'Monthly Statement (' . $startOfMonth->format('F Y') . ')',
            $monthlyHeadings,
            $monthlyRows
        );

        unset($monthly, $monthlyRows);

        $reconFrom = Carbon::now()->subYear()->startOfDay();
        $reconTo   = Carbon::now()->endOfDay();
        $reconTx   = Transaction::with('user')
            ->whereBetween('created_at', [$reconFrom, $reconTo])
            ->where(function ($q) {
                $q->where('user_id', \Company::Account_id)
                    ->orWhere('chart_of_account', \Company::Account_id);
            })
            ->orderByDesc('id')
            ->get();

        $reconHeadings = ['Client name', 'Credit or Debit amount', 'Payment method', 'Date', 'Trust or Operating account'];
        $reconRows     = $reconTx->map(function (Transaction $t) {
            return [
                'Client name'                => trim(($t->user->name ?? $t->name ?? '') . ' ' . ($t->user->last_name ?? $t->last_name ?? '')),
                'Credit or Debit amount'     => $this->transactionAmount($t),
                'Payment method'             => trim(($t->payment_method ?? '') . ($t->payment_number ? '#' . $t->payment_number : '')),
                'Date'                       => $this->formatUsDate($t->created_at),
                'Trust or Operating account' => $t->transaction_type,
            ];
        });

        $this->storeExcel('10_bank_reconciliation.xlsx', $reconHeadings, $reconRows);
        $this->storePdfSafely('10_bank_reconciliation.pdf', 'Bank Reconciliation (last 12 months)', $reconHeadings, $reconRows);

        unset($reconTx, $reconRows);

        $this->manifest[] = [
            'file'    => '11_check_print.pdf',
            'status'  => 'skipped',
            'rows'    => 0,
            'message' => 'Check PDF is form-generated (not a DB dump). Use /export-check in the app.',
        ];

        $dumpHeadings = [
            'ID',
            'Reference',
            'Credit',
            'Debit',
            'Type',
            'Description',
            'Bill link',
            'Payment method',
            'Balances',
            'User ID',
            'Transaction type',
            'Created at',
        ];
        $dumpRows = collect();
        Transaction::query()->orderByDesc('id')->chunk(500, function ($chunk) use (&$dumpRows) {
            foreach ($chunk as $t) {
                $dumpRows->push([
                    'ID'               => $t->id,
                    'Reference'        => $t->reference_id,
                    'Credit'           => $t->credit,
                    'Debit'            => $t->debit,
                    'Type'             => $t->type,
                    'Description'      => $t->description,
                    'Bill link'        => $t->bill_id,
                    'Payment method'   => $t->payment_method,
                    'Balances'         => $t->cbalance,
                    'User ID'          => $t->user_id,
                    'Transaction type' => $t->transaction_type,
                    'Created at'       => $this->formatUsDate($t->created_at, true),
                ]);
            }
        });

        $this->storeExcel('12_full_transaction_dump.xlsx', $dumpHeadings, $dumpRows);
        $this->storeCsv('12_full_transaction_dump.csv', $dumpHeadings, $dumpRows);

        // Dompdf cannot reliably render thousands of rows in one file (memory),
        // so write multiple PDFs that together cover every row.
        $this->storePdfChunks(
            '12_full_transaction_dump',
            'Full Transaction Dump',
            $dumpHeadings,
            $dumpRows,
            400
        );

        // Remove old single preview PDF if present (root or area folder)
        foreach ([
            $this->outputPath . DIRECTORY_SEPARATOR . '12_full_transaction_dump.pdf',
            $this->outputPath . DIRECTORY_SEPARATOR . 'Transactions - Financial' . DIRECTORY_SEPARATOR . '12_full_transaction_dump.pdf',
        ] as $legacyPdf) {
            if (File::exists($legacyPdf)) {
                File::delete($legacyPdf);
            }
        }

        unset($dumpRows);
    }

    protected function exportReports(): void
    {
        $this->storeMaatwebsite('13_pending_deposit_report.xlsx', new PendingDepositExport([
            'billing_cycle' => ['all'],
            'status'        => 'all',
        ]));
        $this->storeMaatwebsite('14_pending_enrollment_report.xlsx', new PendingEnrollmentExport([
            'status' => 'all',
        ]));

        $referralHeadings = [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Source Info',
            'Age',
            'Status',
            'Email Status',
            'Phone',
            'Gender',
            'DOB',
            'Patient Status',
            'Created By',
        ];
        $referralRows = Referral::query()->orderBy('id')->get()->map(function (Referral $referral) {
            $converted = ! empty($referral->getRawOriginal('convert_to_customer'));

            return [
                'ID'             => $referral->id,
                'First Name'     => $referral->first_name,
                'Last Name'      => $referral->last_name,
                'Email'          => $referral->email,
                'Source Info'    => $this->sourceInfoLabel(
                    $referral->source_type,
                    $referral->getRawOriginal('source')
                ),
                'Age'            => $referral->age,
                'Status'         => $referral->status,
                'Email Status'   => $referral->email_status,
                'Phone'          => $referral->phone_number,
                'Gender'         => $referral->gender,
                'DOB'            => $this->formatUsDate($referral->getRawOriginal('date_of_birth') ?: $referral->date_of_birth),
                'Patient Status' => $converted
                    ? 'Converted To Customer'
                    : ($referral->status ?: ''),
                'Created By'     => $referral->created_by,
            ];
        });
        $this->storeExcel('15_custom_referrals.xlsx', $referralHeadings, $referralRows);

        $leadHeadings = [
            'ID',
            'Language',
            'Contact First Name',
            'Contact Last Name',
            'Contact Phone',
            'Contact Email',
            'Relation to Patient',
            'Patient First Name',
            'Patient Last Name',
            'Patient Phone',
            'Patient Email',
            'Interested In',
            'Sub Status',
            'Assigned To',
            'Note',
            'Source Type',
            'Source Info',
            'Created At',
            'Updated At',
        ];
        $leadRows = Lead::query()->orderBy('id')->get()->map(function (Lead $lead) {
            return [
                'ID'                   => $lead->id,
                'Language'             => $lead->language,
                'Contact First Name'   => $lead->contact_first_name,
                'Contact Last Name'    => $lead->contact_last_name,
                'Contact Phone'        => $lead->contact_phone,
                'Contact Email'        => $lead->contact_email,
                'Relation to Patient'  => $lead->relation_to_patient,
                'Patient First Name'   => $lead->patient_first_name,
                'Patient Last Name'    => $lead->patient_last_name,
                'Patient Phone'        => $lead->patient_phone,
                'Patient Email'        => $lead->patient_email,
                'Interested In'        => $lead->interested_in,
                'Sub Status'           => $lead->sub_status,
                'Assigned To'          => $lead->vendor_id,
                'Note'                 => $lead->note,
                'Source Type'          => $lead->source_type,
                'Source Info'          => $this->sourceInfoLabel(
                    $lead->source_type,
                    $lead->getRawOriginal('source')
                ),
                'Created At'           => $lead->created_at,
                'Updated At'           => $lead->updated_at,
            ];
        });
        $this->storeExcel('16_custom_leads.xlsx', $leadHeadings, $leadRows);

        $contactHeadings = [
            'ID',
            'First Name',
            'Last Name',
            'Practice',
            'Account',
            'Phone',
            'Email',
            'Fax',
            'Extension',
            'Address',
        ];
        $contactRows = contacts::query()->orderBy('id')->get()->map(function (contacts $contact) {
            $accountId = $contact->getRawOriginal('account');
            $account   = $accountId ? User::find($accountId) : null;
            $addressParts = array_filter([
                $contact->getRawOriginal('address'),
                $contact->city,
                $contact->state,
                $contact->zip_code,
                $contact->country,
            ]);

            return [
                'ID'         => $contact->id,
                'First Name' => $contact->fname,
                'Last Name'  => $contact->lname,
                'Practice'   => $contact->name_of_practice,
                'Account'    => $account
                    ? trim($account->name . ' ' . ($account->last_name ?? ''))
                    : ($accountId ?: ''),
                'Phone'      => $contact->phone,
                'Email'      => $contact->email,
                'Fax'        => $contact->fax,
                'Extension'  => $contact->ext_number,
                'Address'    => implode(', ', $addressParts),
            ];
        });
        $this->storeExcel('17_custom_contacts.xlsx', $contactHeadings, $contactRows);

        $vendorMap = [
            'id' => 'ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'address_2' => 'Address 2',
            'website' => 'Website',
            'country' => 'Country',
            'full_ssn' => 'Full SSN',
            'dob' => 'Date of Birth',
            'address' => 'Address',
            'state' => 'State',
            'city' => 'City',
            'zipcode' => 'Zip Code',
            'email' => 'Email',
            'marital_status' => 'Marital Status',
            'vendor_type' => 'Vendor Type',
            'vendor_type_name' => 'Vendor Type Name',
            'gender' => 'Gender',
            'role' => 'Role',
            'account_status' => 'Account Status',
            'user_balance' => 'User Balance',
            'date_of_withdrawal' => 'Date of Withdrawal',
            'docs' => 'Document',
            'created_at' => 'Created Date',
            'updated_at' => 'Updated Date',
            'phone' => 'Phone Number',
            'billing_method' => 'Billing Methode',
            'billing_cycle' => 'Billing Cycle',
            'notify_by' => 'Notify By',
        ];
        $this->exportMappedModel(
            '18_custom_vendor_accounts.xlsx',
            User::query()->where('role', 'Vendor')->orderBy('id'),
            $vendorMap
        );
    }

    protected function exportDocuments(): void
    {
        $note = "Legal / operational document PDFs are generated from the Documents module per referral/customer.\n"
            . "Use the app UI to download Approval letter, Joinder, HIPAA, DOH, MAP, Disability,\n"
            . "Client acknowledgement, and Trusted surplus / VOD receipts.\n";

        $path = rtrim($this->outputPath, DIRECTORY_SEPARATOR)
            . DIRECTORY_SEPARATOR
            . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $this->pathInArea('19_documents_note.txt'));
        File::ensureDirectoryExists(dirname($path));
        File::put($path, $note);

        $this->manifest[] = [
            'file'    => $this->pathInArea('19_documents_note.txt'),
            'status'  => 'info',
            'rows'    => 0,
            'path'    => $path,
            'message' => 'Bulk document PDFs are per-customer in Documents UI (not a single DB dump).',
        ];
    }

    /**
     * Source label as shown on /referral and /leads (vendor, contact, friend/family, walk-in, manual).
     */
    protected function sourceInfoLabel(?string $sourceType, $source): string
    {
        switch ($sourceType) {
            case 'account':
                $account = User::find($source);
                return $account ? trim($account->name . ' ' . ($account->last_name ?? '')) . ' (vendor)' : 'Account not found';
            case 'contact':
                $contact = contacts::find($source);
                return $contact ? trim(($contact->fname ?? '') . ' ' . ($contact->lname ?? '')) . ' (contact)' : 'Account not found';
            case 'FnF':
                return $source ? $source . ' (friend or family)' : 'Friend or Family name not found';
            case 'walk_in':
                return 'Walk In';
            case 'manual':
                return 'Manual';
            default:
                return $sourceType || $source ? trim((string) $sourceType . ' ' . (string) $source) : 'N/A';
        }
    }

    /**
     * @param Builder $query
     */
    protected function exportMappedModel(string $filename, $query, array $columnMap): void
    {
        $table     = $query->getModel()->getTable();
        $available = array_values(array_filter(array_keys($columnMap), function ($col) use ($table) {
            return Schema::hasColumn($table, $col);
        }));

        if (empty($available)) {
            $this->manifest[] = [
                'file'    => $filename,
                'status'  => 'skipped',
                'rows'    => 0,
                'message' => "No matching columns on table {$table}",
            ];
            return;
        }

        $records  = $query->get($available);
        $headings = array_map(fn($col) => $columnMap[$col], $available);
        $rows     = $records->map(function ($row) use ($available, $headings) {
            $labeled = [];
            foreach ($available as $i => $col) {
                $value = $row->getAttribute($col);
                if ($value instanceof \DateTimeInterface) {
                    $value = $this->formatUsDate($value, true);
                } elseif (is_string($value) && preg_match('/^\d{4}-\d{2}-\d{2}/', $value)) {
                    $value = $this->formatUsDate($value, str_contains($value, ':'));
                } elseif (is_object($value)) {
                    $value = method_exists($value, '__toString') ? (string) $value : json_encode($value);
                }
                $labeled[$headings[$i]] = $value;
            }

            return $labeled;
        });

        $this->storeExcel($filename, $headings, $rows);
    }

    protected function transactionAmount(Transaction $t): string
    {
        if (! empty($t->credit) && (float) $t->credit > 0) {
            return number_format((float) $t->credit, 2, '.', '');
        }
        if (! empty($t->debit) && (float) $t->debit > 0) {
            return number_format((float) $t->debit, 2, '.', '');
        }
        if (isset($t->amount) && $t->amount !== null && (float) $t->amount > 0) {
            return number_format((float) $t->amount, 2, '.', '');
        }

        return '0.00';
    }

    protected function creditDebitLabel(Transaction $t): string
    {
        if (! empty($t->statusamount)) {
            return ucfirst(strtolower($t->statusamount));
        }
        if (! empty($t->credit) && (float) $t->credit > 0) {
            return 'Credit';
        }
        if (! empty($t->debit) && (float) $t->debit > 0) {
            return 'Debit';
        }

        return '';
    }

    protected function storeMaatwebsite(string $filename, $export): void
    {
        if (! $this->wants('excel')) {
            return;
        }

        $filename = $this->pathInArea($filename);
        $relative = $this->storageRelativePath($filename);

        try {
            Excel::store($export, $relative, 'local');
        } catch (\Throwable $e) {
            $filename = $this->timestampedFilename($filename);
            $relative = $this->storageRelativePath($filename);
            Excel::store($export, $relative, 'local');
        }

        $stored = storage_path('app/' . $relative);
        $path   = $this->copyToOutputPath($filename, $stored);

        $rows = 0;
        try {
            if (method_exists($export, 'collection')) {
                $rows = $export->collection()->count();
            }
        } catch (\Throwable $e) {
            $rows = 0;
        }

        $this->manifest[] = [
            'file'   => $filename,
            'status' => 'ok',
            'rows'   => $rows,
            'path'   => $path,
        ];
    }

    protected function storeExcel(string $filename, array $headings, Collection $rows): void
    {
        if (! $this->wants('excel')) {
            return;
        }

        $filename = $this->pathInArea($filename);

        $ordered = $rows->values()->map(function ($row) use ($headings) {
            $line = [];
            foreach ($headings as $heading) {
                $line[] = is_array($row) && array_key_exists($heading, $row) ? $row[$heading] : '';
            }
            return $line;
        });

        $export   = new ArrayExport($headings, $ordered);
        $relative = $this->storageRelativePath($filename);

        try {
            Excel::store($export, $relative, 'local');
        } catch (\Throwable $e) {
            $filename = $this->timestampedFilename($filename);
            $relative = $this->storageRelativePath($filename);
            Excel::store($export, $relative, 'local');
        }

        $stored = storage_path('app/' . $relative);
        $path   = $this->copyToOutputPath($filename, $stored);

        $this->manifest[] = [
            'file'   => $filename,
            'status' => 'ok',
            'rows'   => $rows->count(),
            'path'   => $path,
        ];
    }

    protected function storeCsv(string $filename, array $headings, Collection $rows): void
    {
        if (! $this->wants('csv')) {
            return;
        }

        $filename = $this->pathInArea($filename);
        $path     = rtrim($this->outputPath, DIRECTORY_SEPARATOR)
            . DIRECTORY_SEPARATOR
            . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename);
        File::ensureDirectoryExists(dirname($path));

        $handle = fopen($path, 'w');
        fputcsv($handle, $headings);
        foreach ($rows as $row) {
            $line = [];
            foreach ($headings as $heading) {
                $line[] = is_array($row) && array_key_exists($heading, $row) ? $row[$heading] : '';
            }
            fputcsv($handle, $line);
        }
        fclose($handle);

        // Mirror into default storage location when custom --path is used
        $defaultDir = storage_path('app/client_data_exports');
        if ((realpath($this->outputPath) ?: $this->outputPath) !== (realpath($defaultDir) ?: $defaultDir)) {
            $mirror = $defaultDir . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename);
            File::ensureDirectoryExists(dirname($mirror));
            File::copy($path, $mirror);
        }

        $this->manifest[] = [
            'file'   => $filename,
            'status' => 'ok',
            'rows'   => $rows->count(),
            'path'   => $path,
        ];
    }

    protected function storePdfSafely(string $filename, string $title, array $headings, Collection $rows, ?int $limit = null): void
    {
        if (! $this->wants('pdf')) {
            return;
        }

        try {
            $previousLimit = $this->pdfRowLimit;
            if ($limit !== null) {
                $this->pdfRowLimit = $limit;
            }
            $this->storePdf($filename, $title, $headings, $rows);
            $this->pdfRowLimit = $previousLimit;
        } catch (\Throwable $e) {
            $this->pdfRowLimit = $previousLimit ?? $this->pdfRowLimit;
            $this->manifest[] = [
                'file'    => $filename,
                'status'  => 'skipped',
                'rows'    => 0,
                'message' => 'PDF skipped (memory/size): use Excel/CSV. ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Write ALL rows across multiple PDF files (covers complete dataset).
     */
    protected function storePdfChunks(
        string $filenamePrefix,
        string $title,
        array $headings,
        Collection $rows,
        int $chunkSize = 400
    ): void {
        if (! $this->wants('pdf')) {
            return;
        }

        @ini_set('memory_limit', '2048M');

        $total = $rows->count();
        if ($total === 0) {
            $this->manifest[] = [
                'file'    => $filenamePrefix . '.pdf',
                'status'  => 'skipped',
                'rows'    => 0,
                'message' => 'No rows to export',
            ];
            return;
        }

        $chunks     = $rows->values()->chunk($chunkSize);
        $totalParts = $chunks->count();
        $part       = 0;

        foreach ($chunks as $chunk) {
            $part++;
            $filename = $this->pathInArea(sprintf(
                '%s_part%02d_of_%02d.pdf',
                $filenamePrefix,
                $part,
                $totalParts
            ));
            $partTitle = sprintf(
                '%s — Part %d of %d (rows %d–%d of %d)',
                $title,
                $part,
                $totalParts,
                (($part - 1) * $chunkSize) + 1,
                min($part * $chunkSize, $total),
                $total
            );

            try {
                $previousLimit     = $this->pdfRowLimit;
                $this->pdfRowLimit = $chunk->count();
                $this->storePdf($filename, $partTitle, $headings, $chunk->values(), false);
                $this->pdfRowLimit = $previousLimit;
            } catch (\Throwable $e) {
                $this->pdfRowLimit = $previousLimit ?? $this->pdfRowLimit;
                $this->manifest[] = [
                    'file'    => $filename,
                    'status'  => 'skipped',
                    'rows'    => 0,
                    'message' => 'PDF part skipped: ' . $e->getMessage(),
                ];
            }
        }

        $this->manifest[] = [
            'file'    => $this->pathInArea($filenamePrefix . '_parts'),
            'status'  => 'ok',
            'rows'    => $total,
            'message' => "Complete PDF set: {$totalParts} part(s) covering all {$total} rows",
        ];
    }

    protected function storePdf(string $filename, string $title, array $headings, Collection $rows, bool $applyArea = true): void
    {
        if (! $this->wants('pdf')) {
            return;
        }

        if ($applyArea) {
            $filename = $this->pathInArea($filename);
        }

        $limited   = $rows->take($this->pdfRowLimit)->values();
        $truncated = $rows->count() > $this->pdfRowLimit;

        $html = view('exports.client-data-matrix-pdf', [
            'title'     => $title,
            'headings'  => $headings,
            'rows'      => $limited,
            'truncated' => $truncated,
            'total'     => $rows->count(),
            'limit'     => $this->pdfRowLimit,
            'generated' => $this->formatUsDate(now(), true),
        ])->render();

        $path = rtrim($this->outputPath, DIRECTORY_SEPARATOR)
            . DIRECTORY_SEPARATOR
            . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename);
        File::ensureDirectoryExists(dirname($path));

        try {
            Pdf::loadHTML($html)->setPaper('a4', 'landscape')->save($path);
        } catch (\Throwable $e) {
            $base = basename(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename));
            $dir  = dirname(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename));
            $filename = ($dir !== '.' ? $dir . '/' : '') . $this->timestampedFilename($base);
            $path     = rtrim($this->outputPath, DIRECTORY_SEPARATOR)
                . DIRECTORY_SEPARATOR
                . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename);
            File::ensureDirectoryExists(dirname($path));
            Pdf::loadHTML($html)->setPaper('a4', 'landscape')->save($path);
        }

        $defaultDir = storage_path('app/client_data_exports');
        if ((realpath($this->outputPath) ?: $this->outputPath) !== (realpath($defaultDir) ?: $defaultDir)) {
            $mirror = $defaultDir . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename);
            File::ensureDirectoryExists(dirname($mirror));
            File::copy($path, $mirror);
        }

        $this->manifest[] = [
            'file'    => $filename,
            'status'  => 'ok',
            'rows'    => $limited->count(),
            'path'    => $path,
            'message' => $truncated ? "PDF capped at {$this->pdfRowLimit} of {$rows->count()} rows" : null,
        ];
    }

    protected function resolveOutputFile(string $filename, string $stored): string
    {
        return $this->copyToOutputPath($filename, $stored);
    }

    protected function storageRelativePath(string $filename): string
    {
        $filename = str_replace('\\', '/', $filename);
        $default  = realpath(storage_path('app/client_data_exports')) ?: storage_path('app/client_data_exports');
        $output   = realpath($this->outputPath) ?: $this->outputPath;

        if ($output === $default) {
            $relative = 'client_data_exports/' . ltrim($filename, '/');
            File::ensureDirectoryExists(storage_path('app/' . dirname($relative)));
            return $relative;
        }

        // Keep custom output under storage/app when possible; otherwise write default then copy.
        $customDir = 'client_data_exports/_run_' . date('Ymd_His');
        if ($this->currentAreaFolder) {
            $customDir .= '/' . $this->currentAreaFolder;
        }
        File::ensureDirectoryExists(storage_path('app/' . $customDir));

        return $customDir . '/' . basename($filename);
    }

    protected function timestampedFilename(string $filename): string
    {
        $normalized = str_replace('\\', '/', $filename);
        $dir        = dirname($normalized);
        $base       = basename($normalized);
        $name       = pathinfo($base, PATHINFO_FILENAME);
        $ext        = pathinfo($base, PATHINFO_EXTENSION);
        $updated    = $name . '_updated_' . date('Ymd_His') . ($ext ? '.' . $ext : '');

        return ($dir !== '.' ? $dir . '/' : '') . $updated;
    }

    protected function copyToOutputPath(string $filename, string $stored): string
    {
        $path = rtrim($this->outputPath, DIRECTORY_SEPARATOR)
            . DIRECTORY_SEPARATOR
            . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename);
        File::ensureDirectoryExists(dirname($path));

        if (! File::exists($stored)) {
            return $stored;
        }

        $default = realpath(storage_path('app/client_data_exports')) ?: storage_path('app/client_data_exports');
        $output  = realpath($this->outputPath) ?: $this->outputPath;

        if ($output === $default && @realpath($stored) === @realpath($path)) {
            return $path;
        }

        try {
            File::copy($stored, $path);
            return $path;
        } catch (\Throwable $e) {
            $base = basename(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename));
            $dir  = dirname(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $filename));
            $altName = ($dir !== '.' ? $dir . DIRECTORY_SEPARATOR : '') . $this->timestampedFilename($base);
            $alt     = rtrim($this->outputPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $altName;
            File::ensureDirectoryExists(dirname($alt));
            File::copy($stored, $alt);
            return $alt;
        }
    }

    public function writeReadme(): void
    {
        $this->ensureOutputDirectory();
        $lines   = [];
        $lines[] = 'SLC Trust — Client Data Matrix Exports';
        $lines[] = 'Formats: ' . implode(', ', $this->formats);
        $lines[] = 'Generated: ' . $this->formatUsDate(now(), true);
        $lines[] = 'Output: ' . $this->outputPath;
        $lines[] = str_repeat('-', 72);
        $lines[] = '';
        $lines[] = 'Folders (matrix areas):';
        foreach ($this->areaFolders() as $step => $folder) {
            $lines[] = '  - ' . $folder . '  (--step=' . $step . ')';
        }
        $lines[] = '';

        foreach ($this->manifest as $item) {
            $lines[] = sprintf(
                '[%s] %s | rows=%s%s',
                strtoupper($item['status'] ?? 'ok'),
                $item['file'] ?? '',
                $item['rows'] ?? 0,
                ! empty($item['message']) ? ' | ' . $item['message'] : ''
            );
        }

        $lines[] = '';
        $lines[] = 'Re-run anytime:';
        $lines[] = '  php artisan export:client-data-matrix --all';
        $lines[] = '  php artisan export:client-data-matrix --step=customers';
        $lines[] = '  php artisan export:client-data-matrix --step=bills';
        $lines[] = '  php artisan export:client-data-matrix --step=finance';
        $lines[] = '  php artisan export:client-data-matrix --step=reports';
        $lines[] = '  php artisan export:client-data-matrix --step=documents';
        $lines[] = '  php artisan export:client-data-matrix --all --path="D:/exports/slc"';
        $lines[] = '';
        $lines[] = 'Format options:';
        $lines[] = '  --format=all';
        $lines[] = '  --format=excel';
        $lines[] = '  --format=csv';
        $lines[] = '  --format=pdf';
        $lines[] = '  --format=excel,csv';
        $lines[] = '  --format=excel,pdf';
        $lines[] = '  --format=csv,pdf';
        $lines[] = '  php artisan export:client-data-matrix --step=customers --format=excel,csv';

        File::put($this->outputPath . DIRECTORY_SEPARATOR . 'README.txt', implode(PHP_EOL, $lines) . PHP_EOL);
    }
}
