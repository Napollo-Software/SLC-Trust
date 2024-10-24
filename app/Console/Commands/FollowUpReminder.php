<?php

namespace App\Console\Commands;

use App\Exports\Users;
use App\Models\Followup;
use App\Models\Notifcation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FollowUpReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'followup:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send followup email';

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

        $followups = Followup::where('type','followup')->where('date',Carbon::today()->format('Y-m-d'))->get();
        foreach ($followups as $followup){
            $user = User::find($followup->to);

            $admins = User::where('role', "admin")->get();
            foreach ($admins as $admin){
                $notifcation = new Notifcation();
                $notifcation->user_id = $admin->id;
                $notifcation->name = $admin->name;
                $notifcation->description = 'Today Follow up for '.$user->email.': '.$followup->note;
                $notifcation->title = 'Followup';
                $notifcation->status = 0;
                $notifcation->save();
            }
            $notifcation = new Notifcation();
            $notifcation->user_id = $user->id;
            $notifcation->name = $user->name;
            $notifcation->description = $followup->note;
            $notifcation->title = 'Followup';
            $notifcation->status = 0;
            $notifcation->save();
//            Log::info($user->email);
        }
        \Log::info("Followup Job is completed successfully on ".date('d-m-y',strtotime(now())));
        return 0;
    }
}
