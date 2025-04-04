<?php

namespace App\Http\Controllers;

use DateTime;
use Redirect;
use Carbon\Carbon;
use App\Models\Lead;
use App\Models\User;
use App\Models\Report;
use App\Models\contacts;
use App\Models\Referral;
use App\Models\PayeeModel;
use App\Models\Transaction;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use CreateClosingBalancesTable;
use Illuminate\Support\Facades\Log;
use App\Exports\PendingDepositExport;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use App\Exports\PendingEnrollmentExport;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        $reports = $reports->map(function ($report) {
            $report->fileUrl = json_decode($report->fileUrl, true);
            return $report;
        });
        if (request()->wantsJson()) {
            return response()->json($reports);
        }
        return view('reports.index', compact('reports'));
    }
    public function pendingDepsit()
    {
        $users = collect([]);
        return view('reports.pending-deposite', compact('users'));
    }

    public function pendingDepsitFilter(Request $request)
    {
        if (!$request->filled('billing_cycle') && !$request->filled('status')) {
            return response()->json([
                'html' => view('partials.user_list', ['users' => collect()])->render() // Empty collection
            ]);
        }
        
        $query = User::with([
            'transactions' => function ($query) {
                $query->selectRaw('user_id, sum(credit) as total_credit, sum(debit) as total_debit')
                    ->groupBy('user_id');
            }
        ]);

        // Filter by billing cycle
        if ($request->filled('billing_cycle')) {
            $query->whereIn('billing_cycle', $request->billing_cycle);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'done') {
                $query->whereHas('transactions', function ($q) {
                    $q->where('type', 'deposit');
                });
            } else {
                $query->whereDoesntHave('transactions', function ($q) {
                    $q->where('type', 'deposit');
                });
            }
        }
        $query->where('account_status', 'Approved')
            ->where('role', 'User');

        $users = $query->get();

        foreach ($users as $user) {
            $credit = $user->transactions->sum('total_credit');
            $debit = $user->transactions->sum('total_debit');
            $user->balance = $credit - $debit;
        }

        return response()->json([
            'html' => view('partials.user_list', compact('users'))->render()
        ]);
    }
    public function pendingDepsitExport(Request $request, Excel $excel): BinaryFileResponse
    {
        $request->validate([
            'billing_cycle' => 'nullable|array',
            'billing_cycle.*' => 'string',
            'status' => 'nullable|string',
        ]);

        $filters = [
            'billing_cycle' => $request->input('billing_cycle', []),
            'status' => $request->input('status', null),
        ];

        if (empty($filters['billing_cycle']) && empty($filters['status'])) {
            return response()->noContent(204); 
        }

        $fileName = 'PendingDeposits_' . now()->format('Ymd_His') . '.xlsx';

        return $excel->download(new PendingDepositExport($filters), $fileName);
    }

    public function pendingEnrollment()
    {
        $users = collect([]);
        return view('reports.pending-enrollment', compact('users'));
    }

    public function pendingEnrollmentFilter(Request $request)
    {
        if (!$request->filled('status')) {
            return response()->json([
                'html' => view('partials.user_list', ['users' => collect()])->render() // Empty collection
            ]);
        }
        
        $query = User::with([
            'transactions' => function ($query) {
                $query->selectRaw('user_id, sum(credit) as total_credit, sum(debit) as total_debit')
                    ->groupBy('user_id');
            }
        ]);

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'done') {
                $query->whereHas('transactions', function ($q) {
                    $q->where('type', 'enrollment_fee');
                });
            } else {
                $query->whereDoesntHave('transactions', function ($q) {
                    $q->where('type', 'enrollment_fee');
                });
            }
        }
        $query->where('account_status', 'Approved')
            ->where('role', 'User');

        $users = $query->get();

        foreach ($users as $user) {
            $credit = $user->transactions->sum('total_credit');
            $debit = $user->transactions->sum('total_debit');
            $user->balance = $credit - $debit;
        }

        return response()->json([
            'html' => view('partials.user_list', compact('users'))->render()
        ]);
    }
    public function pendingEnrollmentExport(Request $request, Excel $excel): BinaryFileResponse
    {
        $request->validate([
            'billing_cycle' => 'nullable|array',
            'billing_cycle.*' => 'string',
            'status' => 'nullable|string',
        ]);

        $filters = [
            'billing_cycle' => $request->input('billing_cycle', []),
            'status' => $request->input('status', null),
        ];

        if (empty($filters['status'])) {
            return response()->noContent(204); 
        }

        $fileName = 'PendingEnrollment_' . now()->format('Ymd_His') . '.xlsx';

        return $excel->download(new PendingEnrollmentExport($filters), $fileName);
    }
    public function view($id)
    {
        $report = Report::find($id);
        $startDate = $report->start_date;
        $endDate = $report->end_date;
        $fileURL = $report->fileUrl;
        $decodedData = json_decode($fileURL, true);
        $filterCallback = function ($value) {
            return $value !== 0;
        };
        $referralData = array_filter($decodedData['referralJsonArray'], $filterCallback);
        $leadData = array_filter($decodedData['leadJsonArray'], $filterCallback);
        $contactData = array_filter($decodedData['contactJsonArray'], $filterCallback);
        $accountData = array_filter($decodedData['accountJsonArray'], $filterCallback);
        $referral = array_fill_keys(array_keys($referralData), null);
        $lead = array_fill_keys(array_keys($leadData), null);
        $contact = array_fill_keys(array_keys($contactData), null);
        $account = array_fill_keys(array_keys($accountData), null);
        $referralModel = new Referral();
        $leadModel = new Lead();
        $contactModel = new contacts();
        $accountModel = new User();
        $referralModel->setTable('referrals');
        $leadModel->setTable('leads');
        $contactModel->setTable('contacts');
        $accountModel->setTable('users');
        $referralReport = empty($referral) ? [] : $referralModel->select(array_keys($referral))->whereBetween('created_at', [$startDate, $endDate])->get();
        $leadReport = empty($lead) ? [] : $leadModel->select(array_keys($lead))->whereBetween('created_at', [$startDate, $endDate])->get();
        $contactReport = empty($contact) ? [] : $contactModel->select(array_keys($contact))->whereBetween('created_at', [$startDate, $endDate])->get();
        $accountReport = empty($account) ? [] : $accountModel->select(array_keys($account))->where('role', ['Vendor'])->whereBetween('created_at', [$startDate, $endDate])->get();
        return view('reports.view', compact('referralReport', 'leadReport', 'contactReport', 'accountReport', 'report', 'referralData', 'leadData', 'contactData', 'accountData', 'lead'));
    }


    public function add_report()
    {
        return view('reports.add');
    }

    public function duplicate(Request $request, Report $report)
    {
        $newReport = $report->replicate();

        $newReport->title = $report->title . ' (Copy)';
        $newReport->description = $report->description . ' (Copy)';
        $newReport->save();

        $duplicatedReport = [
            'id' => $newReport->id,
            'type' => $newReport->type,
            'category' => $newReport->category,
            'object' => $newReport->object,
            'created_at' => $newReport->created_at,
            'title' => $newReport->title,
            'description' => $newReport->description,
            'created_by' => $newReport->user->name,
            'view_url' => route('view.report', ['id' => $newReport->id]),
        ];

        return response()->json($duplicatedReport);
    }



    public function transaction(Request $request)
    {

        $start_date = '';
        $end_date = '';
        $user_id = '';
        $type = $request->type ?? '';

        $users = User::where('role', 'User')->get();
        $transactions = Transaction::where('user_id', \Company::Account_id);

        if ($request->type == 'operational') {
            $transactions = $transactions->where('transaction_type', \TransactionType::Operational)->orderBy('id', 'DESC')->get();
        } elseif ($request->type == 'trusted_surplus') {
            $transactions = $transactions->where('transaction_type', \TransactionType::TrustedSurplus)->orderBy('id', 'DESC')->get();
        } else {
            $transactions = $transactions->orderBy('id', 'DESC')->get();
        }

        return view('reports.transaction', compact('users', 'transactions', 'start_date', 'end_date', 'user_id', 'type'));

    }

    public function monthly_statement(Request $request)
    {
        $start_date = '';
        $end_date = '';
        $user_id = '';
        $users = User::where('role', 'User')->get();
        $transactions = [];

        return view('reports.monthly-statement', compact('users', 'transactions', 'start_date', 'end_date', 'user_id'));
    }

    public function bank_reconciliation(Request $request)
    {
        $startDate = Carbon::now()->subMonths(2)->startOfMonth();
        $endDate = Carbon::now()->subMonths(2)->endOfMonth();

        $payments = Transaction::where('chart_of_account', \Company::Account_id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where(function ($query) {
                $query->where('description', 'LIKE', '%payment against%')
                    ->orwhere('description', 'LIKE', '%deduct amount%');
            })
            ->get();
        $deposits = Transaction::where('chart_of_account', \Company::Account_id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where(function ($query) {
                $query->where('description', 'LIKE', '%deposit%')
                    ->orWhere('description', 'LIKE', '%add amount%');
            })
            ->get();

        $opening_start_date = Carbon::now()->subMonth(3)->startOfMonth();
        $opening_end_date = Carbon::now()->subMonth(3)->endOfMonth();

        $opening_payments = Transaction::where('chart_of_account', \Company::Account_id)
            ->whereBetween('created_at', [$opening_start_date, $opening_end_date])
            ->where(function ($query) {
                $query->where('description', 'LIKE', '%payment against%')
                    ->orwhere('description', 'LIKE', '%deduct amount%');
            })
            ->sum('deduction');
        $opening_deposits = Transaction::where('chart_of_account', \Company::Account_id)
            ->whereBetween('created_at', [$opening_start_date, $opening_end_date])
            ->where(function ($query) {
                $query->where('description', 'LIKE', '%deposit%')
                    ->orWhere('description', 'LIKE', '%add amount%');
            })
            ->sum('deduction');
        $opening_balance = $opening_deposits - $opening_payments;


        $start_date = Carbon::now();
        $start_date = $start_date->subMonth()->format('Y-m');
        $end_date = '';
        $user_id = '';
        $users = User::where('role', 'User')->get();
        $transactions = [];
        return view('reports.bank-reconciliation', compact('users', 'transactions', 'start_date', 'end_date', 'user_id', 'opening_balance', 'payments', 'deposits', ));
    }

    public function filter_bank_reconciliation(Request $request)
    {
        $date = explode('-', $request->from);
        $year = $date[0];
        $month = $date[1];
        $start_date = Carbon::create($year, $month, 1)->startOfMonth();
        $endDate = $start_date->copy()->endOfMonth();
        $opening_balance = Transaction::where('chart_of_account', \Company::Account_id)->whereBetween('created_at', [$start_date, $endDate])->sum('deduction');
        $payments = Transaction::where('chart_of_account', \Company::Account_id)
            ->whereBetween('created_at', [$start_date, $endDate])
            ->where(function ($query) {
                $query->where('description', 'LIKE', '%payment against%')
                    ->orwhere('description', 'LIKE', '%deduct amount%');
            })
            ->get();
        $deposits = Transaction::where('chart_of_account', \Company::Account_id)
            ->whereBetween('created_at', [$start_date, $endDate])
            ->where(function ($query) {
                $query->where('description', 'LIKE', '%deposit%')
                    ->orWhere('description', 'LIKE', '%add amount%');
            })
            ->get();
        $this_month = Carbon::now()->format('Y-m');
        $start_date = $start_date->format('Y-m');
        $end_date = '';
        $user_id = '';
        $users = User::where('role', 'User')->get();
        $transactions = [];
        return view('reports.bank-reconciliation', compact('users', 'transactions', 'start_date', 'end_date', 'user_id', 'opening_balance', 'payments', 'deposits', 'this_month', ));
    }

    public function check(Request $request)
    {
        $users = User::where('role', 'User')->get();
        $payees = PayeeModel::get();
        return view('reports.check', compact('users', 'payees'));
    }

    public function filter_user(Request $request)
    {
        $start_date = Carbon::parse($request->from);
        $end_date = Carbon::parse($request->to);
        $user_id = $request->user;
        $type = $request->type;
        $users = User::where('role', 'User')->get();
        $transactions = Transaction::query();
        if ($start_date && $end_date) {
            $transactions->whereDate('created_at', '>=', $start_date)
                ->whereDate('created_at', '<=', $end_date);
        }
        if ($request->user) {
            $transactions->where('user_id', $request->user);
        }
        if ($request->type == 'operational') {
            $transactions->where('transaction_type', $request->type);
        }
        if ($request->type == 'trusted_surplus') {
            $transactions->where('transaction_type', 'Trusted Surplus');
        }
        $transactions = $transactions->get();
        $start_date = $request->from;
        $end_date = $request->to;
        return view('reports.transaction', compact('users', 'transactions', 'start_date', 'end_date', 'user_id', 'type'));
    }

    public function monthly_filter(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'user' => 'required'
        ]);

        $start_date = $request->from;
        $user_id = $request->user;

        $year = date('Y', strtotime($start_date));
        $month = date('m', strtotime($start_date));
        $users = User::where('role', 'User')->get();

        $transactions = Transaction::where('user_id', $request->user)
            ->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)->get();

        return view('reports.monthly-statement', compact('users', 'transactions', 'start_date', 'user_id'));
    }

    public function monthly_mass_statement($user_id)
    {

        $user = User::find($user_id);
        $month = new DateTime();
        $month->modify('last day of this month');
        $transactions = Transaction::where('chart_of_account', null)->where('user_id', $user_id)->whereMonth('created_at', '=', $month->format('m'))->get();
        return view('reports.monthly-mass-statement', compact('user', 'transactions'));
    }

    public function exportCheck(Request $request)
    {
        return view('reports.export-check');
    }
    // public function storeClosingBalance(Request $request)
    // {
    //     // Access the 'closingBalance' value from the request
    //     $closingBalance = $request->closingBalance;
    //     dd($closingBalance);
    //     // Create a new instance of the model
    //     $balanceTable = new CreateClosingBalancesTable();

    //     // Assign the 'closingBalance' value to the model attribute
    //     $balanceTable->closing_balance = $closingBalance;

    //     // Save the model instance to the database
    //     $balanceTable->save();
    // }
    public function upload_file(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'file' => 'required|max:10240|mimes:xlsx,xls,csv',
        ]);

        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploaded-reports'), $fileName);
        $fileUrl = "/uploaded-reports/$fileName";
        $report = new Report();
        $report->title = $request->title;
        $report->description = $request->description;
        $report->fileUrl = $fileUrl;
        $report->uploaded_by = Session::get("loginId");
        $report->save();


        return response()->json(['success' => 'File uploaded successfully.', 'file' => $fileName]);
    }
    public function getAllReports()
    {
    }


    public function saveReport(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();
        $reportArray = $request->input('reportArray');
        $userId = Session::get("loginId");
        $data = json_decode($reportArray, true);
        $report = new Report();
        $report->fileUrl = json_encode($data);
        $report->title = $request->input('report_title');
        $report->description = $request->input('report_description');
        $report->uploaded_by = $userId;
        $report->type = $request->input('summaryRadio') == 'on' ? "summary" : "details";
        $report->category = $request->input('category');
        $report->object = $request->input('object');
        $report->start_date = $startDate;
        $report->end_date = $endDate;
        $report->save();
        return response()->json([
            'message' => 'Report saved successfully',
        ]);
    }

    public function getTableColumns(Request $request)
    {

        $tableColumns = [];
        if ($request->has('referral') && $request->boolean('referral')) {
            if (Schema::hasTable('referrals')) {
                $tableColumns['referral'] = Schema::getColumnListing('referrals');
            }
        }
        if ($request->has('account') && $request->boolean('account')) {
            if (Schema::hasTable('users')) {
                $tableColumns['account'] = Schema::getColumnListing('users');
            }
        }
        if ($request->has('lead') && $request->boolean('lead')) {
            if (Schema::hasTable('leads')) {
                $tableColumns['lead'] = Schema::getColumnListing('leads');
            }
        }
        if ($request->has('contacts') && $request->boolean('contacts')) {
            if (Schema::hasTable('contacts')) {
                $tableColumns['contacts'] = Schema::getColumnListing('contacts');
            }
        }
        return response()->json($tableColumns);
    }

    public function submitSelectedColumns(Request $request)
    {

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'report_title' => 'required',
            'report_description' => 'required',
        ]);
        $referralColumnMappings = [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'case_type' => 'Case Type',
            'age' => 'Age',
            'status' => 'Status',
            'email_status' => 'Email Status',
            'phone_number' => 'Phone Number',
            'gender' => 'Gender',
            'date_of_birth' => 'Date of Birth',
            'email' => 'Email',
            'country' => 'Country',
            'city' => 'City',
            'state' => 'State',
            'address' => 'Address',
            'zip_code' => 'Zip Code',
            'apt_suite' => 'Apt Suite',
            'patient_ssn' => 'Patient SSN',
            'medicaid_number' => 'Medicaid Number',
            'medicaid_plan' => 'Medicaid Plan',
            'medicare_number' => 'Medicare Number',
            'source_type' => 'Source Type',
            'source' => 'Source',
            'admission_date' => 'Admission Date',
            'trustEsign' => 'TrustEsign',
            'trustDocument' => 'TrustDocument',
            'trustFinance' => 'TrustFinance',
            'trustCheckList' => 'TrustCheckList',
            'created_by' => 'Created By',
            'intake' => 'Intake',
            'marketer' => 'Marketer',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
        $leadColumnMappings = [
            'id' => 'ID',
            'case_type_id' => 'Case Type ID',
            'language' => 'Language',
            'contact_first_name' => 'Contact First Name',
            'contact_last_name' => 'Contact Last Name',
            'contact_phone' => 'Contact Phone',
            'contact_email' => 'Contact Email',
            'relation_to_patient' => 'Relation to Patient',
            'patient_first_name' => 'Patient First Name',
            'patient_last_name' => 'Patient Last Name',
            'patient_phone' => 'Patient Phone',
            'patient_email' => 'Patient Email',
            'interested_in' => 'Interested In',
            'sub_status' => 'Sub Status',
            'vendor_id' => 'Vendor ID',
            'converted_to_referral' => 'Converted to Referral',
            'case_type' => 'Case Type',
            'note' => 'Note',
            'source_type' => 'Source Type',
            'source_id' => 'Source ID',
            'source' => 'Source',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
        $contactsColumnMappings = [
            'id' => 'ID',
            'fname' => 'First Name',
            'lname' => 'Last Name',
            'name_of_practice' => 'Name of Practice',
            'account' => 'Account',
            'phone' => 'Phone',
            'email' => 'Email',
            'fax' => 'Fax',
            'ext_number' => 'Extension Number',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'address' => 'Address',
            'designation' => 'Designation',
            'vendor_id' => 'Vendor ID',
            'created_by' => 'Created by',
            'updated_at' => 'Updated Date',
            'created_at' => 'Created Date',
        ];
        $accountColumnMappings = [
            'id' => 'ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'profile_pic' => 'Profile Picture',
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
            'avatar' => 'Avatar',
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

        $referralJsonArray = [];
        $leadJsonArray = [];
        $contactJsonArray = [];
        $accountJsonArray = [];
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        if (!empty($request->checkedReferral)) {
            $referralData = Referral::select($request->checkedReferral)->whereBetween('created_at', [$startDate, $endDate])->get();
            foreach ($referralColumnMappings as $key => $value) {
                if (in_array($key, $request->checkedReferral)) {
                    $referralJsonArray[$key] = 1;
                } else {
                    $referralJsonArray[$key] = 0;
                }
            }
        } else {
            $referralData = null;
        }
        if (!empty($request->checkedLead)) {
            $leadData = Lead::select($request->checkedLead)->whereBetween('created_at', [$startDate, $endDate])->get();
            foreach ($leadColumnMappings as $key => $value) {
                if (in_array($key, $request->checkedLead)) {
                    $leadJsonArray[$key] = 1;
                } else {
                    $leadJsonArray[$key] = 0;
                }
            }
        } else {
            $leadData = null;
        }
        if (!empty($request->checkedAccount)) {
            $accountData = User::select($request->checkedAccount)->where('role', ['Vendor'])->whereBetween('created_at', [$startDate, $endDate])->get();
            foreach ($accountColumnMappings as $key => $value) {
                if (in_array($key, $request->checkedAccount)) {
                    $accountJsonArray[$key] = 1;
                } else {
                    $accountJsonArray[$key] = 0;
                }
            }
        } else {
            $accountData = null;
        }
        if (!empty($request->checkedContacts)) {
            $contactData = contacts::select($request->checkedContacts)->whereBetween('created_at', [$startDate, $endDate])->get();
            foreach ($contactsColumnMappings as $key => $value) {
                if (in_array($key, $request->checkedContacts)) {
                    $contactJsonArray[$key] = 1;
                } else {
                    $contactJsonArray[$key] = 0;
                }
            }
        } else {
            $contactData = null;
        }
        $mergedArray = [
            'referralJsonArray' => $referralJsonArray,
            'leadJsonArray' => $leadJsonArray,
            'contactJsonArray' => $contactJsonArray,
            'accountJsonArray' => $accountJsonArray,
        ];
        return response()->json([
            'message' => 'Selected columns submitted successfully',
            'contact' => $contactData,
            'referral' => $referralData,
            'lead' => $leadData,
            'account' => $accountData,
            'reportArray' => $mergedArray
        ]);
    }
    public function updateReport(Request $request)
    {
        $updated_by = Session::get("loginId");
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();
        $reportArray = $request->input('reportArray');
        $data = json_decode($reportArray, true);
        $report = Report::find($request->report_id);
        $userId = $report->uploaded_by;
        if ($data !== null) {
            $report->fileUrl = json_encode($data);
        }
        $report->title = $request->input('report_title');
        $report->description = $request->input('report_title');
        $report->uploaded_by = $userId;
        $report->updated_by = $updated_by;
        $report->type = $request->input('summaryRadio') == 'on' ? "summary" : "details";
        $report->category = $request->input('category');
        $report->object = $request->input('object');
        $report->start_date = $startDate;
        $report->end_date = $endDate;
        $report->save();
        return response()->json([
            'message' => 'Update saved successfully',
        ]);
    }
}
