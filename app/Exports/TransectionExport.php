<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\User;
use Carbon\Carbon;

class TransectionExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    protected $start_date,$end_date,$user_id,$type;


 function __construct( $start_date,  $end_date,$user_id, $type) {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->user_id = $user_id;
        $this->type = $type;
 }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'Transaction id',
            'Name',
            'Description',
            'Status',
            'Amount',
        ];
    }
    public function collection()
    {
        $result = array();
        $start_date= $this->start_date ? Carbon::parse($this->start_date) :null;
        $end_date= $this->end_date ? Carbon::parse($this->end_date) :null;
        if($this->start_date != null && $this->end_date != null && $this->user_id == "null" && $this->type == null){
            $transactions = Transaction::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->where('chart_of_account',\Intrustpit::Account_id)->get();
            $result = array();
            foreach($transactions as $transaction){
                $user_id = User::where('id',$transaction->user_id)->first();
                $result[]=array(
                    'id'=>'TID# '.$transaction->id,
                    'name'=>$user_id->name.''.$user_id->last_name,
                    'description'=>$transaction->description,
                    'status'=>$transaction->statusamount,
                    'amount'=>'$'.$transaction->deduction,
                );
            }
        }else if($this->start_date != null && $this->end_date != null && $this->user_id  != 'null' && $this->type == null){
            $transactions =  Transaction::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->where('user_id',$this->user_id)->where('chart_of_account',\Intrustpit::Account_id)->get();
            $user_id = User::where('id',$this->user_id)->first();
            $result = array();
            foreach($transactions as $transaction){
                $result[]=array(
                    'id'=>'TID# '.$transaction->id,
                    'name'=>$user_id->name.''.$user_id->last_name,
                    'description'=>$transaction->description,
                    'status'=>$transaction->statusamount,
                    'amount'=>'$'.$transaction->deduction,
                );
            }

            // $result[]=array(
            //     'account'=>'',
            // );
            // $result[]=array(
            //     'account'=>'Current Balance:',
            //     'type'=>number_format($user_id->user_balance,2,".",","),
            // );
        }else if($this->user_id != 'null' && $this->start_date ==null && $this->end_date ==null && $this->type == null){
            $transactions = Transaction::where('user_id',$this->user_id)->where('chart_of_account',\Intrustpit::Account_id)->get();
            $user_id = User::where('id',$this->user_id)->first();
            $result = array();
            foreach($transactions as $transaction){
                $result[]=array(
                    'id'=>'TID# '.$transaction->id,
                    'name'=>$user_id->name.''.$user_id->last_name,
                    'description'=>$transaction->description,
                    'status'=>$transaction->statusamount,
                    'amount'=>'$'.$transaction->deduction,
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
        ////Operational
       else if($this->start_date != null && $this->end_date != null && $this->user_id == 'null' && $this->type =='operational'){
            $transactions = Transaction::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->where('chart_of_account',\Intrustpit::Account_id)->where('transaction_type','Operational')->get();
            $result = array();
            foreach($transactions as $transaction){
                $users = User::where('id',$transaction->user_id)->get();
                foreach($users as $user_id){
                    $result[]=array(
                        'id'=>'TID# '.$transaction->id,
                        'name'=>$user_id->name.''.$user_id->last_name,
                        'description'=>$transaction->description,
                        'status'=>$transaction->statusamount,
                        'amount'=>'$'.$transaction->deduction,
                    );
                }
            }
        }else if($this->start_date != null && $this->end_date != null && $this->user_id  != 'null' && $this->type =='operational'){
            $transactions =  Transaction::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->where('user_id',$this->user_id)->where('chart_of_account',\Intrustpit::Account_id)->where('transaction_type','Operational')->get();
            $user_id = User::where('id',$this->user_id)->first();
            $result = array();
            foreach($transactions as $transaction){
                $result[]=array(
                    'id'=>'TID# '.$transaction->id,
                    'name'=>$user_id->name.''.$user_id->last_name,
                    'description'=>$transaction->description,
                    'status'=>$transaction->statusamount,
                    'amount'=>'$'.$transaction->deduction,
                );
            }

            // $result[]=array(
            //     'account'=>'',
            // );
            // $result[]=array(
            //     'account'=>'Current Balance:',
            //     'type'=>number_format($user_id->user_balance,2,".",","),
            // );
        }else if($this->user_id != 'null' && $this->start_date == null && $this->end_date == null && $this->type =='operational'){
            $transactions = Transaction::where('user_id',$this->user_id)->where('chart_of_account',\Intrustpit::Account_id)->where('transaction_type','Operational')->get();
            $user_id = User::where('id',$this->user_id)->first();
            $result = array();
            foreach($transactions as $transaction){
                $result[]=array(
                    'id'=>'TID# '.$transaction->id,
                    'name'=>$user_id->name.''.$user_id->last_name,
                    'description'=>$transaction->description,
                    'status'=>$transaction->statusamount,
                    'amount'=>'$'.$transaction->deduction,
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
        else if($this->user_id == 'null' && $this->start_date == null && $this->end_date == null && $this->type =='operational'){
            $transactions = Transaction::where('chart_of_account',\Intrustpit::Account_id)->where('transaction_type','Operational')->get();
            $result = array();
            foreach($transactions as $transaction){
                $users = User::where('id',$transaction->user_id)->get();
                foreach($users as $user_id){
                    $result[]=array(
                        'id'=>'TID# '.$transaction->id,
                        'name'=>$user_id->name.''.$user_id->last_name,
                        'description'=>$transaction->description,
                        'status'=>$transaction->statusamount,
                        'amount'=>'$'.$transaction->deduction,
                    );
                }
            }
        }
        /////Trusted Surplus

       else if($this->start_date != null && $this->end_date != null && $this->user_id == 'null' && $this->type =='trusted_surplus'){
            $transactions = Transaction::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->where('transaction_type', 'Trusted Surplus')->where('chart_of_account',\Intrustpit::Account_id)->get();

            $result = array();
            foreach($transactions as $transaction){
                $users = User::where('id',$transaction->user_id)->get();
                foreach($users as $user_id){
                    $result[]=array(
                        'id'=>'TID# '.$transaction->id,
                        'name'=>$user_id->name.''.$user_id->last_name,
                        'description'=>$transaction->description,
                        'status'=>$transaction->statusamount,
                        'amount'=>'$'.$transaction->deduction,
                    );
                }
            }
        }else if($this->start_date != null && $this->end_date != null && $this->user_id  != 'null' && $this->type =='trusted_surplus'){
            $transactions =  Transaction::whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->where('transaction_type', 'Trusted Surplus')->where('user_id',$this->user_id)->where('chart_of_account',\Intrustpit::Account_id)->get();
            $user_id = User::where('id',$this->user_id)->first();
            $result = array();
            foreach($transactions as $transaction){
                $result[]=array(
                    'id'=>'TID# '.$transaction->id,
                    'name'=>$user_id->name.''.$user_id->last_name,
                    'description'=>$transaction->description,
                    'status'=>$transaction->statusamount,
                    'amount'=>'$'.$transaction->deduction,
                );
            }

            // $result[]=array(
            //     'account'=>'',
            // );
            // $result[]=array(
            //     'account'=>'Current Balance:',
            //     'type'=>number_format($user_id->user_balance,2,".",","),
            // );
        }else if($this->user_id != 'null' && $this->start_date == null && $this->end_date == null && $this->type =='trusted_surplus'){
            $transactions = Transaction::where('user_id',$this->user_id)->where('transaction_type', 'Trusted Surplus')->where('chart_of_account',\Intrustpit::Account_id)->get();
            $user_id = User::where('id',$this->user_id)->first();
            $result = array();
            foreach($transactions as $transaction){
                $result[]=array(
                    'id'=>'TID# '.$transaction->id,
                    'name'=>$user_id->name.''.$user_id->last_name,
                    'description'=>$transaction->description,
                    'status'=>$transaction->statusamount,
                    'amount'=>'$'.$transaction->deduction,
                );
            }
            // $result[]=array(
            //     'account'=>'',
            // );
            // $result[]=array(
            //     'account'=>'Current Balance:',
            //     'type'=>number_format($user_id->user_balance,2,".",","),
            // );
        }else if($this->user_id == 'null' && $this->start_date == null && $this->end_date == null && $this->type =='trusted_surplus'){
            $transactions = Transaction::where('transaction_type', 'Trusted Surplus')->where('chart_of_account',\Intrustpit::Account_id)->get();
            $result = array();
            foreach($transactions as $transaction){
                $users = User::where('id',$transaction->user_id)->get();
                foreach($users as $user_id){
                    $result[]=array(
                        'id'=>'TID# '.$transaction->id,
                        'name'=>$user_id->name.''.$user_id->last_name,
                        'description'=>$transaction->description,
                        'status'=>$transaction->statusamount,
                        'amount'=>'$'.$transaction->deduction,
                    );
                }
            }
        }
        return collect($result);
    }

}
