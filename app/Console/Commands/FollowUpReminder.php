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

        $currentDate = Carbon::today()->format('Y-m-d');
        $currentHour = Carbon::now()->format('H');
        $followups = Followup::where('type', 'followup')
        ->whereDate('date', $currentDate)
        ->whereTime('time', 'like', $currentHour . ':%')
        ->get();
        foreach ($followups as $followup){
            $user = User::find($followup->to);
            $admins = User::where('role', "admin")->get();

            foreach ($admins as $admin)
            {
                Notifcation::create([
                    'user_id' => $admin->id,
                    'name' => $admin->name,
                    'description' => 'Follow-up Reminder for '.$user->full_name().' "'.$followup->note.'" scheduled for today at '.$followup->time,
                    'title' => 'Followup',
                    'status' => 0,
                ]);
            }

            Notifcation::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'description' => $followup->note,
                'title' => 'Followup',
                'status' => 0,
            ]);
        }
        \Log::info("Followup Job is completed successfully on ".date('d-m-y',strtotime(now())).' '.$currentHour);
        return 0;
    }
}
