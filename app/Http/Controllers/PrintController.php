<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\User;
use App\Models\Category;
use App\Models\Notifcation;
use App\Models\Transaction;
use Session;
use PDF;
use App\Exports\latestbill;
use App\Exports\deletebills;
use App\Exports\userbills;
use App\Exports\AllTransaction;
use App\Exports\BankReconciliationExport;
use App\Exports\UserTransaction;
use App\Exports\TransectionExport;
use App\Exports\TransectionMonthlyExport;
use App\Exports\UserExport;
use App\Exports\Users;
use App\Exports\PendingBillExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class PrintController extends Controller
{
    public function prnpriview()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role != 'User') {
            $claims = Claim::whereBetween('id', [874, 1241])->get();
        } else if ($role == 'User') {

            $claims = Claim::orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->get();
        }
        return view('printClaims', compact('claims'));
    }
    public function pdfview()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role != 'User') {
            $claim = Claim::all();
        } else if ($role == 'User') {

            $claim = Claim::orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->get();
        }

        $claims =
            [
                'data' => $claim,
            ];
        $pdf = PDF::loadView('pdfview', $claims)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('latestbill.pdf');
    }
    public function deletepdfbill()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        //dd($role);

        if ($role != 'User') {

            $claim = Claim::orderBy('id', 'desc')->onlyTrashed()->paginate(10);
        } else if ($role == 'User') {

            $claim = Claim::orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->paginate(15);
        }
        $claims =
            [
                'data' => $claim,
            ];
        $pdf = PDF::loadView('claims.deletebillpdf', $claims)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('deletebills.pdf');
    }
    public function export()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role != 'User') {
            return Excel::download(new latestbill, 'latestbill.xlsx');
        } else if ($role == 'User') {

            return back();
        }
    }
    public function exportcsv()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role == 'Admin') {
            return Excel::download(new latestbill, 'latestbill.csv');
        } else if ($role == 'User') {

            return back();
        }
    }

    public function userexport()
    {

        return Excel::download(new userbills, 'userbill.xlsx');
    }
    public function userexportcsv()
    {

        return Excel::download(new userbills, 'userbill.csv');
    }

    public function deletebillexport()
    {


        return Excel::download(new deletebills, 'deletebills.xlsx');
    }
    public function deletebillcsv()
    {

        return Excel::download(new deletebills, 'deletebills.csv');
    }

    public function printuser()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role != 'User') {
            $users = User::where('account_status','Approved')->get();
        } else if ($role == 'User') {

            $users = User::where('id', Session::get('loginId'))->get();
        }


        return view('printUser', compact('users'));
    }
    public function pdfuserview()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role != 'User') {
            $user = User::all();
        } else if ($role == 'User') {

            $user = User::where('id', Session::get('loginId'))->get();
        }


        $users =
            [
                'data' => $user,
            ];
        $pdf = PDF::loadView('pdfUserview', $users)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('Users.pdf');
    }
    public function exportuser()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role != 'User') {
            return Excel::download(new User, 'users.xlsx');
        } else if ($role == 'User') {

            return back();
        }
    }
    public function exportcsvuser()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role != 'User') {
            return Excel::download(new Users, 'users'.rand().'.xlsx');
        } else if ($role == 'User') {

            return back();
        }
    }
    public function changestatus()
    {
        $id = User::where('id', '=', Session::get('loginId'))->first();
        $notifcation = Notifcation::where('user_id', $id->id)->orderBy('id', 'desc')->get();
        foreach ($notifcation as $key => $notifiy) {
            $notifcation[$key]->status = 1;
            $notifcation[$key]->save();
        }
        return view('notifcation', compact('notifcation'));
    }
    public function printedit($id)
    {
        $user = User::find($id);
        return view('prituserdata', compact('user'));
    }
    public function claimprint($id)
    {
        $users = User::all();
        $claim = Claim::find($id);
        $categories = Category::all();
        return view('claims.editprint', compact('claim', 'users', 'categories'));
    }
    public function claimviewprint($id)
    {
        $users = User::all();
        $claim = Claim::find($id);
        $categories = Category::all();
        return view('claims.editprint', compact('claim', 'users', 'categories'));
    }
    public function alluserprint()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');

        if ($role != 'User') {
            //$claims = Claim::orderBy('id', 'desc')->paginate(15);
            $claims = Claim::orderBy('id', 'desc')->onlyTrashed()->paginate(10);
            $all_users = User::all();
        } else if ($role == 'User') {

            $claims = Claim::orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->paginate(15);
            $all_users = User::all();
        }
        return view('claims.printdeleteduser', compact('claims', 'all_users', 'role'));
    }
    public function transactionprint()
    {
        $start_date = null;
        $type = null;
        $user = 'null';
        $transactions = collect();

        $role = User::where('id', '=', Session::get('loginId'))->value('role');

        if ($role != 'User')
        {
            $transactions = Transaction::where('chart_of_account', '!=', '')->orderBy('id', 'desc')->get();
        }
        elseif ($role == 'User')
        {
            $transactions = Transaction::where('chart_of_account', null)->where('user_id', Session::get('loginId'))->orderBy('id', 'desc')->get();
        }

        return view('transactionprint', compact('transactions', 'start_date', 'type', 'user'));
    }
    public function transactionsprint(Request $request)
    {
        $start_date = $request->from ? Carbon::parse($request->from) : null;
        $end_date = $request->to ? Carbon::parse($request->to) : null;
        $user = $request->user;
        $type = $request->type;
        $transactions = Transaction::where('chart_of_account', \Company::Account_id);
        if ($request->from != null && $request->to != null && $request->user == 'null' && $request->type == null) {
            $transactions = $transactions->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        } else if ($request->from != null && $request->to != null && $request->user != 'null' && $request->type == null) {
            $transactions = $transactions->where('user_id', $request->user)->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();
        } else if ($request->user != 'null' && $request->type == null && $request->from == null && $request->to == null) {
            $transactions = $transactions->where('user_id', $request->user)->get();
        }
        ////Operational

        else if ($request->from != null && $request->to != null && $request->user == 'null' && $request->type == 'operational') {
            $transactions = $transactions->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('transaction_type', 'Operational')->get();
        } else if ($request->from != null && $request->to != null && $request->user != 'null'  && $request->type == 'operational') {
            $transactions = $transactions->where('user_id', $request->user)->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('transaction_type', 'Operational')->get();
        } else if ($request->user != 'null'  && $request->type == 'operational' && $request->from == null && $request->to == null) {
            $transactions = $transactions->where('user_id', $request->user)->where('transaction_type', 'Operational')->where('chart_of_account', \Company::Account_id)->get();
        } else if ($request->type == 'operational' && $request->user == 'null' && $request->from == null && $request->to == null) {
            $transactions = $transactions->where('transaction_type', 'Operational')->get();
        }
        //Trusted Surplus
        else if ($request->from != null && $request->to != null && $request->user == 'null' && $request->type == 'trusted_surplus') {
            $transactions = $transactions->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('transaction_type', 'Trusted Surplus')->get();
        } else if ($request->from != null && $request->to != null && $request->user != 'null'  && $request->type == 'trusted_surplus') {
            $transactions = $transactions->where('user_id', $request->user)->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('transaction_type', 'Trusted Surplus')->get();
        } else if ($request->user != 'null'  && $request->type == 'trusted_surplus' && $request->from == null && $request->to == null) {
            $transactions = $transactions->where('user_id', $request->user)->where('transaction_type', 'Trusted Surplus')->get();
        } else if ($request->type == 'trusted_surplus' && $request->user == 'null' && $request->from == null && $request->to == null) {
            $transactions = $transactions->where('transaction_type', 'Trusted Surplus')->get();
        }
        $start_date = $request->from;
        $end_date = $request->to;
        return view('transactionprint', compact('transactions', 'start_date', 'end_date', 'user', 'type'));
    }
    public function transactionsprintpdf(Request $request)
    {
        $start_date = $request->from;
        $user_id = $request->user;
        $year = date('Y', strtotime($start_date));
        $month = date('m', strtotime($start_date));
        $transactions = Transaction::where('user_id', $request->user)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('chart_of_account', \Company::Account_id)->get();
        return view('monthly-transaction-pdf', compact('transactions', 'year', 'month', 'user_id'));
    }
    public function reconciliationprintpdf(Request $request)
    {
        $start_date = $request->from;
        $end_date = $request->to;
        $user_id = $request->user;
        $transactions = Transaction::where('user_id', $user_id)->whereBetween('created_at', [$start_date, $end_date])->where('chart_of_account', \Company::Account_id)->get();
        return view('bank-reconciliation-pdf', compact('transactions', 'start_date', 'end_date', 'user_id'));
    }
    public function transactionsexport(Request $request)
    {
        $start_date = $request->from ? Carbon::parse($request->from) : null;
        $end_date = $request->to ? Carbon::parse($request->to) : null;
        $user_id = $request->user ? $request->user : null;
        $type = $request->type ? $request->type : null;
        return Excel::download(new TransectionExport($start_date, $end_date, $user_id, $type), 'transactions.xlsx');
    }
    public function export_user()
    {
        return Excel::download(new UserExport(), 'user.xlsx');
    }
    public function transactions_monthly_export(Request $request)
    {
        $start_date = $request->from ? $request->from : ' ';
        $user_id = $request->user ? $request->user : ' ';
        return Excel::download(new TransectionMonthlyExport($start_date, $user_id), 'transactions.xlsx');
    }
    public function transactions_reconciliation_export(Request $request)
    {
        $start_date = $request->from ? $request->from : ' ';
        $user_id = $request->user ? $request->user : ' ';
        $end_date = $request->to ? $request->to : ' ';
        return Excel::download(new BankReconciliationExport($start_date, $end_date, $user_id), 'bank-reconciliation.xlsx');
    }

    public function pdftransaction()
    {
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role != 'User') {
            $transaction = Transaction::all();
        } else if ($role == 'User') {

            $transaction = Transaction::where('user_id', Session::get('loginId'))->get();
        }


        $transactions =
            [
                'data' => $transaction,
            ];
        $pdf = PDF::loadView('pdftransaction', $transactions)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('transactions.pdf');
    }
    public function export_pending_bills(Request $request)
    {

        return Excel::download(new PendingBillExport, 'pending-bills-'.rand().' '.date("m-d-Y", strtotime(now())) . '.xlsx');
    }
    public function exporttrasaction()
    {

        return Excel::download(new AllTransaction, 'transactions.xlsx');
    }
    public function csvtransaction()
    {

        return Excel::download(new AllTransaction, 'transactions.csv');
    }
    public function exportusertransaction()
    {

        return Excel::download(new UserTransaction, 'transactions.xlsx');
    }
    public function csvusertransaction()
    {

        return Excel::download(new UserTransaction, 'transactions.csv');
    }
}
