<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Transaction;

class ProcessMaintenanceFee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process_maintenance_fee:cron';

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
        $prcessed=0;
        $date = date('m/d/Y');
        if(checkHoliday($date)==null){
            $transactions = Transaction::where('status',0)->get();
            foreach($transactions as $k=>$data){
                $iteration = $data->iteration + 1;
                $in_process = Transaction::find($data->id);
                if($iteration >= 4){
                    if($data->chart_of_account != null){
                        $user = User::find($data->user_id);
                        if($user->user_balance >= $data->deduction){
                            $user->user_balance = $user->user_balance - $data->deduction;
                            $user->save();
                            $prcessed = 1;
                        }else{
                            $prcessed = 0;
                        }
                    }
                    if($prcessed == 1){
                       $in_process->status = 1;
                    }
                }
                $in_process->iteration = $iteration;
                $in_process->save();
            }
        }
        \Log::info("ProcessMaintenanceFee Cron is working fine!");
    }
}
