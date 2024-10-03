<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Claim;
use App\Models\Category;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Notifcation;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Jobs\sendEmailJob;
use Carbon\Carbon;
class RecurringBill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurringbill:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ledger generated for recurring bills';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $app_name = config('app.professional_name');
        $currentMonth = Carbon::now()->format('Y-m');
        $claims=Claim::where('recurring_bill', 1)
        ->where(function($query){
            $query->where('claim_status', 'Approved')
            ->orwhere('claim_status', 'Partially approved');
        })->get();
        foreach($claims as $k=>$claim){
            $claimUser = User::find($claim->claim_user);
            $Category=Category::find($claim->claim_category);
            if(date('d',strtotime(now())) == $claim->recurring_day && date('m-d-Y',strtotime(now())) >= date('m-d-Y',strtotime($claim->created_at->addMonth()))){
            // if(date('d',strtotime(now())) + 1 == date('d',strtotime($claim->created_at))){
        //   if($claim->id == '99'){
            //if(date('d',strtotime(now())) == $claim->recurring_day && date('m-d-Y',strtotime(now())) >= date('m-d-Y',strtotime($claim->created_at->addMonth()))){
            // if($claim->claim_amount > $claimUser->user_balance){
            //     /////////////User Bill Notification/////////////
            //     $notifcation=new Notifcation();
            //     $notifcation->user_id=$claimUser->id;
            //     $notifcation->name=$claimUser->name;
            //     $notifcation->bill_id=$claim->id;
            //     $notifcation->description='Your recurring bill#'.$claim->id.' added on '.date('m-d-Y', strtotime($claim->created_at)).' has not been processed because you have insuficient balance.';
            //     $notifcation->title='Insufficient Balance';
            //     $notifcation->status = 0;
            //     $notifcation->save();

            //     $subject = "Insufficient balance";
            //     $name = $claimUser->name.' '.$claimUser->last_name;
            //     $email_message = 'Your recurring bill#'.$claim->id.' added on '.date('m-d-Y', strtotime($claim->created_at)).' has not been processed because you have insuficient balance. Please use the button below to find the details of your bill:';
            //     $url = '/claims/'.$claim->id;
            //     if($claimUser->notify_by == "email"){
            //         \Mail::to($claimUser->email)->send(new \App\Mail\Email($subject,$name,$email_message,$url));
            //     }else{

            //     }
            // }else{
            //         ////////////////Admin Ledger/////////////////
            //         $transaction=new Transaction();
            //         $transaction->chart_of_account=$intrustpit->id;
            //         $transaction->bill_id = $claim->id;
            //         $transaction->user_id=$claimUser->id;
            //         $transaction->name=$claimUser->name;
            //         $transaction->last_name=$claimUser->last_name;
            //         $transaction->deduction=$claim->claim_amount;
            //         $transaction->statusamount="debit";
            //         $transaction->description="{$app_name} has processed ".$claimUser->name."'s payment against bill submitted for ".$Category->category_name." category.";
            //         $transaction->bill_status = 'Deducted';
            //         $transaction->status = 0;
            //         $transaction->save();
            //         ////////////////Customer Ledger/////////////////
            //         $transaction=new Transaction();
            //         $transaction->user_id=$claimUser->id;
            //         $transaction->bill_id = $claim->id;
            //         $transaction->name=$claimUser->name;
            //         $transaction->last_name=$claimUser->last_name;
            //         $transaction->deduction=$claim->claim_amount;
            //         $transaction->cbalance=$claimUser->user_balance-$claim->claim_amount;
            //         $transaction->statusamount="debit";
            //         $transaction->description="{$app_name} has processed your payment against bill submitted for ".$Category->category_name." category.";
            //         $transaction->bill_status = 'Deducted';
            //         $transaction->status = 0;
            //         $transaction->save();
            //         /////////////User Bill Notification/////////////
            //         $notifcation=new Notifcation();
            //         $notifcation->user_id=$claimUser->id;
            //         $notifcation->name=$claimUser->name;
            //         $notifcation->bill_id=$claim->id;
            //         $notifcation->description="Your recurring bill#".$claim->id." added on ".date('m-d-Y', strtotime($claim->created_at))." has been approved.";
            //         $notifcation->title='Bill Approved';
            //         $notifcation->status = 0;
            //         $notifcation->save();
            //         ////////////Updating Customer Balance/////////////
            //         $claimUser->user_balance = $claimUser->user_balance-$claim->claim_amount;
            //         $claimUser->save();
            //         $subject = "Bill Approved";
            //         $name = $claimUser->name.' '.$claimUser->last_name;
            //         $email_message = "Your recurring bill#".$claim->id." added on ".date('m-d-Y', strtotime($claim->created_at))." has been approved. Please use the button below to find the details of your bill:";
            //         $url = '/claims/'.$claim->id;
            //         if($claimUser->notify_by == "email"){
            //             \Mail::to($claimUser->email)->send(new \App\Mail\Email($subject,$name,$email_message,$url));
            //         }else{

            //         }

            // }
            $check = Claim::where('recurred', $claim->id)
            ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$currentMonth])
            ->whereNull('deleted_at')
            ->first();
            if($check)
            continue;
            $claim = Claim::find($claim->id);
            $new_claim = $claim->replicate();
            $new_claim->claim_status = "Pending";
            $new_claim->partial_amount=null;
            $new_claim->recurring_bill=0;
            $new_claim->recurred=$claim->id;
            $new_claim->recurring_day=null;
            $new_claim->save();
            \Log::info("Recurring bill #".$new_claim->id." against Bill# ".$claim->id."is duplicated successfully on ".date('d-m-y',strtotime(now())));
            /////////////User Bill Notification/////////////
            $notifcation=new Notifcation();
            $notifcation->user_id=$claimUser->id;
            $notifcation->name=$claimUser->name;
            $notifcation->bill_id=$claim->id;
            $notifcation->description='Your recurring bill#'.$new_claim->id.' has been created successfully against '.$Category->category_name.' category.';
            $notifcation->title='Bill Created';
            $notifcation->status = 0;
            $notifcation->save();

            $subject = "Bill Created";
            $name = $claimUser->name.' '.$claimUser->last_name;
            $email_message = 'Your recurring bill#'.$new_claim->id.' has been created successfully against '.$Category->category_name.' category. Please use the button below to find the details of your bill:';
            $url = '/claims/'.$new_claim->id;
            if($claimUser->notify_by == "email"){
                // \Mail::to($claimUser->email)->send(new \App\Mail\Email($subject,$name,$email_message,$url));
            }else{

             }

             $admins_notification = User::where('role','!=',"User")->get();
			   $ignore_admin_notification = [
                    'devops@napollo.net',
                    'svaldivia@trustedsurplus.org',
                    'ldurzieh@trustedsurplus.org',
                    'rbauman@trustedsurplus.org'
                ];
            foreach($admins_notification as $notify){
                 ///////////// Admin Notification/////////////
				 if(in_array($notify->email,$ignore_admin_notification))
                    continue;
                $notifcation=new Notifcation();
                $notifcation->user_id=$notify->id;
                $notifcation->name=$claimUser->name;
                $notifcation->bill_id=$claim->id;
                $notifcation->description=$claimUser->name.' '.$claimUser->last_name."'s recurring bill#".$new_claim->id." has been created and waiting for approval.";
                $notifcation->title='Bill Created';
                $notifcation->status = 0;
                $notifcation->save();
                $details = $claim;
                $subject = "Bill Created";
                $name = $notify->name.' '.$notify->last_name;
                $email_message = $claimUser->name.' '.$claimUser->last_name."'s recurring bill#".$new_claim->id." has been created and waiting for approval. Please use the button below to find the details of the bill:";
                $url = '/claims/'.$new_claim->id;
                if($notify->notify_by == "email"){
                     SendEmailJob::dispatch($notify->email,$subject,$name,$email_message,$url);
                }else{

                }
            }
          }
        }
        \Log::info("Recurring bill Job is completed successfully on ".date('d-m-y',strtotime(now())));
    }
}
