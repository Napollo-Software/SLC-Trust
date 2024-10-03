<?php

namespace App\Console\Commands;
use App\Models\Notifcation;
use App\Models\User;
use App\Models\Claim;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Console\Command;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurringnotify:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $notifications = Claim::where('recurring_bill', 1)->where('claim_status','Approved')->orwhere('claim_status','Partially approved')->get();
        foreach($notifications as $notify){
            $claimUser = User::find($notify->claim_user);
            $category = Category::find($notify->claim_category);
            $notify_before =date_sub(date_create($notify->expense_date),date_interval_create_from_date_string($claimUser->notify_before." days"))->format('m/d/Y');
            if(date('d',strtotime(now()))+$claimUser->notify_before == date('d',strtotime($notify->created_at))){
               //date('d',strtotime(now()))+$claimUser->notify_before ==  $notify->recurring_day && date('m-d-Y',strtotime(now())) >= date('m-d-Y',strtotime($notify->created_at->addMonth()))
                if($notify->claim_amount > $claimUser->user_balance){
                    /////////////User Notification/////////////
                    $notifcation=new Notifcation();
                    $notifcation->user_id=$claimUser->id;
                    $notifcation->name=$claimUser->name;
                    $notifcation->bill_id=$notify->id;
                    $notifcation->description='Your recurring bill#'.$notify->id.' added on '.date('m-d-Y', strtotime($notify->created_at)).' will not processed on day '.$notify->recurring_day.' because you have insuficient balance.';
                    $notifcation->title='Insufficient Balance alert';
                    $notifcation->status = 0;
                    $notifcation->save();
                    $subject = "Insufficient balance alert";
                    $name = $claimUser->name.' '.$claimUser->last_name;
                    $email_message = 'Your recurring bill#'.$notify->id.' added on '.date('m-d-Y', strtotime($notify->created_at)).' will not processed on day '.$notify->recurring_day.' because you have insuficient balance. Please use the button below to find the details of your bill:';
                    $url = '/claims/'.$notify->id;
                    if($claimUser->notify_by == "email"){
                        \Mail::to($claimUser->email)->send(new \App\Mail\Email($subject,$name,$email_message,$url));
                    }else{

                    }
                }else{
                    /////////////User Notification/////////////
                    $notifcation=new Notifcation();
                    $notifcation->user_id=$claimUser->id;
                    $notifcation->name=$claimUser->name;
                    $notifcation->bill_id=$notify->id;
                    $notifcation->description='Your recurring bill#'.$notify->id.' added on '.date('m-d-Y', strtotime($notify->created_at)).' will be processed on day '.$notify->recurring_day.' .';
                    $notifcation->title='Bill approval alert';
                    $notifcation->status = 0;
                    $notifcation->save();
                    $subject = "Bill approval alert";
                    $name = $claimUser->name.' '.$claimUser->last_name;
                    $email_message = 'Your recurring bill#'.$notify->id.' added on '.date('m-d-Y', strtotime($notify->created_at)).' will be processed on day '.$notify->recurring_day.'. Please use the button below to find the details of your bill:';
                    $url = '/claims/'.$notify->id;
                    if($claimUser->notify_by == "email"){
                        \Mail::to($claimUser->email)->send(new \App\Mail\Email($subject,$name,$email_message,$url));
                    }else{

                    }
                }
            }
        }
        $users = User::where('role','User')->get();
        foreach($users as $k=>$user){
            if(date('d',strtotime(now())) == $user->billing_cycle){
                $notifcation=new Notifcation();
                $notifcation->user_id=$user->id;
                $notifcation->name=$user->name;
                $notifcation->description='Hey ! This is deposit reminder from '.$app_name.', Your '.$app_name.' account needs to be topped up.';
                $notifcation->title='Deposit Reminder ';
                $notifcation->status = 0;
                $notifcation->save();
                $subject = "Deposit Reminder ";
                $name = $user->name.' '.$user->last_name;
                $email_message = 'This is deposit reminder from '.$app_name.', Your '.$app_name.' account needs to be topped up.';
                $url = '';
                if($claimUser->notify_by == "email"){
                    \Mail::to($claimUser->email)->send(new \App\Mail\Email($subject,$name,$email_message,$url));
                }else{

                }
            }
        }
        \Log::info("Notify is working fine!");
    }
}
