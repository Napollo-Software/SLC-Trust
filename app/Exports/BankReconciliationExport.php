<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class BankReconciliationExport implements FromCollection, WithHeadings
{
    protected $start_date,$end_date,$user_id;


 function __construct(String $start_date, String $end_date,String $user_id) {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->user_id = $user_id;
 }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Client name',
            'Credit or Debit amount ',
            'Payment method',
            'Date',
            'Trust account or Operating account',
        ];
    }
    public function collection()
    {
        $result = array();

        if($this->start_date != ' ' && $this->end_date != ' ' && $this->user_id  != ' '){
            $transactions =  Transaction::whereBetween('created_at', [$this->start_date, $this->end_date])->where('user_id',$this->user_id)->where('chart_of_account',\Intrustpit::Account_id)->get();
            $result = array();
            $user_id = User::where('id',$this->user_id)->first();
            foreach($transactions as $transaction){
                $result[]=array(
                    'client_name'=>$user_id->name.' '.$user_id->last_name ,
                    'debit_credit'=>'$'.$transaction->deduction,
                    'payment_method'=>$transaction->payment_method.'#'.$transaction->payment_number,
                    'date'=>date('m-d-y', strtotime($transaction->created_at)),
                    'account_type'=>$transaction->transaction_type,
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
