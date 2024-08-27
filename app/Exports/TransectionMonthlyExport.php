<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class TransectionMonthlyExport implements FromCollection, WithHeadings
{
    protected $start_date,$user_id;


    function __construct(String $start_date, String $user_id) {
           $this->start_date = $start_date;
           $this->user_id = $user_id;
    }
       /**
       * @return \Illuminate\Support\Collection
       */
       public function headings(): array
       {
           return [
               'Customer Name',
               'Date',
               'Transactions IDs',
               'Bills ',
               'Deposits',
               'Transaction Adjustments',
           ];
       }
       public function collection()
       {
           $result = array();

           if($this->start_date != ' ' && $this->user_id  != ' '){
            $year = date('Y', strtotime($this->start_date));
            $month = date('m', strtotime($this->start_date));
            $transactions = Transaction::where('user_id',$this->user_id)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('chart_of_account',\Intrustpit::Account_id)->get();
               $result = array();
               $user_id = User::where('id',$this->user_id)->first();
               foreach($transactions as $transaction){
                   $result[]=array(

                       'name'=>$user_id->name.' '.$user_id->last_name,
                       'date'=>date('m-d-y', strtotime($transaction->created_at)),
                       'id'=>'TID# '.$transaction->id,
                       'bill_id'=>'Bill# '.$transaction->bill_id,
                       'deposits'=>'$'.$transaction->deduction,
                       'transaction_adjustment'=>'',
                   );
               }

            // $result[]=array(
            //     'account'=>'',
            // );
            // $result[]=array(
            //     'account'=>'Current Balance:',
            //     'type'=>number_format($user_id->user_balance,2,".",","),
            // );
           }
           return collect($result);
       }

}
