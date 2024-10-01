<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function filterTransactions(Request $request, $module)
    {
        if(!in_array($module, ['pool-fund', 'bill-payments', 'maintainance-fee', 'enrollment-fee']))
        abort(404);

        $transactions = collect();

        if($module == 'pool-fund')
        {
            $transactions = Transaction::where('user_id', "!=", \Company::Account_id)->get();
        }
        else if($module == 'maintainance-fee')
        {
            $transactions = Transaction::where('user_id', \Company::Account_id)->where("type", Transaction::MaintenanceFee)->get();
        }
        else if($module == 'enrollment-fee')
        {
            $transactions = Transaction::where('user_id', \Company::Account_id)->where("type", Transaction::EnrollmentFee)->get();
        }
        else if($module == 'bill-payments')
        {
            $transactions = Transaction::whereNotNull("claim_id")->get();
        }

        return view("filtered-transaction",compact('transactions'));
    }
}
