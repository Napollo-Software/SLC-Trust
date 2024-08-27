<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Notifcation;
use App\Jobs\sendEmailJob;

class AdjustmentController extends Controller
{
    public function index()
    {
        $users = User::where('role','User')->get();
        return view('adjustments.index',compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'user' => 'required',
            'amount' => 'required',
            'details' => 'required'
        ],[
            'user.required' =>'Please select user to create adjustment'
        ]);
        $user_balance = 0;
        $intrustpit=User::find(\Intrustpit::Account_id);
        $user = User::find($request->user);
        if($request->type == 'debit' && $user->user_balance < $request->amount){
            return response()->json(['type'=>0  , 'message' => $user->name.' '.$user->last_name."'s balance is $".$user->user_balance.' which is insufficient to add this adjustment.']);
        }else{
            $user_balance = $user->user_balance - $request->amount;
            $admin_message =  "Adjustment : Intrustpit has processed adjustment entry and deduct amount $".$request->amount." form ".$user->name." ".$user->last_name."' account. Transaction reason is '".$request->details."'.";
            $user_message = "Adjustment : Intrustpit has processed adjustment entry against your account and deduct amount $".$request->amount.". Transaction reason is '".$request->details."'.";
            $type = 'debit';
            $subject = 'Balance Deducted';
        }
        if($request->type == 'credit'){
            $user_balance = $user->user_balance + $request->amount;
            $admin_message =  "Adjustment : Intrustpit has processed adjustment entry and add amount $".$request->amount." to ".$user->name." ".$user->last_name."' account. Transaction reason is '".$request->details."'.";
            $user_message = "Adjustment : Intrustpit has processed adjustment entry against your account and add amount $".$request->amount.". Transaction reason is '".$request->details."'.";
            $type = 'credit';
            $subject = 'Balance Added';
        }
        $user->user_balance = $user_balance;
        $user->save();
        $transaction=new Transaction();
        $transaction->user_id=$user->id;
        $transaction->chart_of_account=$intrustpit->id;
        $transaction->admin_user_name=$intrustpit->name;
        $transaction->admin_last_name=$intrustpit->last_name;
        $transaction->deduction=$request->amount;
        $transaction->name=$user->name;
        $transaction->statusamount=$type;
        $transaction->last_name=$user->last_name;
        $transaction->description= $admin_message;
        $transaction->status = 1;
        $transaction->transaction_type="Trusted Surplus";
        $transaction->save();
        $transaction=new Transaction();
        $transaction->user_id=$user->id;
        $transaction->admin_user_name=$intrustpit->name;
        $transaction->admin_last_name=$intrustpit->last_name;
        $transaction->deduction=$request->amount;
        $transaction->name=$user->name;
        $transaction->statusamount=$type;
        $transaction->cbalance= $user->user_balance;
        $transaction->last_name=$user->last_name;
        $transaction->description= $user_message;
        $transaction->transaction_type="Trusted Surplus";
        $transaction->status = 1;
        $transaction->save();
        $notifcation=new Notifcation();
        $notifcation->user_id=$user->id;
        $notifcation->name=$user->name;
        $notifcation->description=$user_message;
        $notifcation->title=$subject;
        $notifcation->status = 0;
        $notifcation->save();
        $details = User::find($user->id);
        $subject = $subject;
        $name = $user->name.' '.$user->last_name;
        $email_message = $user_message;
        $url = '/main';
        if($user->notify_by == "email"){
           // SendEmailJob::dispatch($user->email,$subject,$name,$email_message,$url);
        }else{
            
        }
        return response()->json(['type'=>1 , 'message'=>'Adjustment has been created successfully.']);
    }
}
