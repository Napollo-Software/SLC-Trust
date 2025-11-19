<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToArray;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use \PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
use Illuminate\Support\Facades\Validator;

class CustomerDepositImport implements ToCollection, WithStartRow,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
         '*.id' => 'required',
        //  '*.date_mmddyyyy' => 'required',
         '*.client_name' => 'required',
         '*.amount' => 'required',
         '*.maintenance_fee'=>'required'
        ])->validate();
        $array=$rows;
        $app_name = config('app.professional_name');
        foreach($array as $k=>$data){
            // if($k!=0)
            {
               // $user_data=explode(' ',$data['client_name']);
                $accountbalance = $data['amount']/100 * 10;
                //$user = User::where('name',$user_data[0])->where('last_name',$user_data[1])->first();
                $user = User::find($data['id']);
                if( $data['date_mmddyyyy'] != ''){
                    $date = Date::excelToDateTimeObject($data['date_mmddyyyy']);
                }else{
                    $date = date("Y-m-d H:i:s");
                }
                // $date = $data['date_mmddyyyy'];
                // $date = date("Y-m-d H:i:s");
                if($user){
                        $file_balance = $data['amount'];
                        $user->user_balance = $user->user_balance + $file_balance;
                        $user->save();
                        if($user->user_balance >= $data['maintenance_fee'] && $data['maintenance_fee'] > 0){
                            $user->user_balance = $user->user_balance - $data['maintenance_fee'];
                            $user->save();
                            $prcessed = 1;
                        }else{
                            $prcessed = 0;
                        }
                        // $balance = $user->user_balance;
                        // if($balance > 0){
                        //    $newbalance = $file_balance + $balance;
                        //    $user->user_balance = $newbalance;
                        //    $user->save();
                        // }else{
                        //     $file_balance = $data['amount'];
                        //     $user->user_balance = $file_balance;
                        //     $user->save();
                        // }
                    //////////////////////Admin Ledger///////////////////
                    if($data['amount'] != 0){
                        $transaction4=new Transaction();
                        $transaction4->user_id=$user->id;
                        $transaction4->chart_of_account=\Company::Account_id;
                        $transaction4->deduction=$file_balance;
                        $transaction4->transaction_type="Trusted Surplus";
                        $transaction4->name=$user->name;
                        $transaction4->statusamount="credit";
                        $transaction4->last_name=$user->last_name;
                        $transaction4->description= $user->name." ".$user->last_name." made $".$file_balance." deposit on ".date('m/d/Y',strtotime(now()))." into {$app_name} account.";
                        $transaction4->bill_status = "Added";
                        $transaction4->status = 1;
                        $transaction4->created_at = $date;
                        $transaction4->save();
                    }
                    if($data['maintenance_fee'] != 0){
                        $transaction5=new Transaction();
                        $transaction5->user_id=$user->id;
                        $transaction5->chart_of_account=\Company::Account_id;
                        $transaction5->deduction=$data['maintenance_fee'];
                        $transaction5->name=$user->name;
                        $transaction5->statusamount="credit";
                        $transaction5->transaction_type="Operational";
                        $transaction5->last_name=$user->last_name;
                        if($data['amount'] == 0){
                            $transaction5->description="{$app_name} $".$data['maintenance_fee']." Maintenance fee deducted on ".date('m/d/Y',strtotime(now()))." from ".$user->name." ".$user->last_name."'s account.";
                        }else{
                            $transaction5->description="{$app_name} $".$data['maintenance_fee']." Maintenance fee deducted against $".$file_balance." balance  on ".date('m/d/Y',strtotime(now()))." from ".$user->name." ".$user->last_name."'s account.";
                        }
                        if($prcessed == 0){
                            $transaction5->description="{$app_name} $".$data['maintenance_fee']." Maintenance fee against ".$user->name." ".$user->last_name."'s account bounced back because customer has insufficient balance.";
                        }
                        $transaction5->bill_status = "Deducted";
                        $transaction5->status = $prcessed;
                        $transaction5->sum_of_credit = 1;
                        $transaction5->created_at = $date;
                        $transaction5->save();
                    }
                    ///////////////////////Customer Ledger///////////////////
                    if($data['amount'] != 0){
                        $transaction4=new Transaction();
                        $transaction4->user_id=$user->id;
                        $transaction4->deduction=$file_balance;
                        $transaction4->cbalance= $user->user_balance;
                        $transaction4->name=$user->name;
                        $transaction4->statusamount="credit";
                        $transaction4->last_name=$user->last_name;
                        $transaction4->transaction_type="Trusted Surplus";
                        $transaction4->description="{$app_name} added $".$file_balance." balance in your account on ".date('m/d/Y',strtotime(now()));
                        $transaction4->bill_status = "Added";
                        $transaction4->status = 1;
                        $transaction4->created_at = $date;
                        $transaction4->save();
                    }
                    if($user->user_balance >= $data['maintenance_fee'] && $data['maintenance_fee'] != 0){
                        $transaction4=new Transaction();
                        $transaction4->user_id=$user->id;
                        $transaction4->deduction=$data['maintenance_fee'];
                        $transaction4->cbalance=$user->user_balance-$data['maintenance_fee'];
                        $transaction4->name=$user->name;
                        $transaction4->statusamount="debit";
                        $transaction4->last_name=$user->last_name;
                        $transaction4->transaction_type="Operational";
                        if($data['amount'] == 0){
                            $transaction4->description="{$app_name} $".$data['maintenance_fee']." Maintenance fee deducted on ".date('m/d/Y',strtotime(now())).".";
                        }else{
                            $transaction4->description="{$app_name} $".$data['maintenance_fee']." Maintenance fee deducted against $".$file_balance." balance  on ".date('m/d/Y',strtotime(now())).".";
                        }
                        $transaction4->bill_status = "Deducted";
                        $transaction4->status = $prcessed;
                        $transaction4->created_at = $date;
                        $transaction4->save();
                        }
                }
            // else{
            //     $user = new User();
            //     $user->name = $user_data[0];
            //     $user->last_name = $user_data[1];
            //     $user->email = $user_data[0].$user_data[1].'@slc.org';
            //     $user->account_status = "Approved";
            //     $user->avatar = "93561655300919_avatar.png";
            //     $user->user_balance = $data['amount'];
            //     $user->password = \Hash::make(strtolower($user_data[0]));
            //     $user->save();
            // }

        }
    }

}

   public function startRow(): int
    {
        return 2;
    }
}
