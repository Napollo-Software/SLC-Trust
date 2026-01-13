<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Notifcation;
use DateTime;
class MonthlyMassReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly_mass_report:cron';

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
        $last_date = new DateTime();
        $last_date->modify('last day of this month');
        if(date('m/d/Y',strtotime(now())) == $last_date->format('m/d/Y')){
            $users = User::where('role','User')->get();
            foreach($users as $user){
                if($user->id == 385)
                {
                $notifcation=new Notifcation();
                $notifcation->user_id=$user->id;
                $notifcation->name=$user->name;
                $notifcation->description='Hey! Your monthly mass report has been generated successfully and shared with you on your email.';
                $notifcation->title='Monthly Mass Report ';
                $notifcation->status = 0;
                $notifcation->save();
                $subject = "Monthly Mass Report ";
                $name = $user->name.' '.$user->last_name;
                $email_message = 'Your monthly mass report has been generated successfully.Please use the url below in order to view and export it.';
                $url = '/monthly-mass-statement/'.$user->id;
                if($user->notify_by == "email"){
                   // \Mail::to($user->email)->send(new \App\Mail\Email($subject,$name,$email_message,$url));
                }else{
                    
                }
              }
            }
        }
        \Log::info("Monthly report generated successfully");
    }
}
