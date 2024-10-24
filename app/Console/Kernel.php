<?php

namespace App\Console;

use App\Console\Commands\FollowUpReminder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\RecurringBill::class,
        Commands\Notify::class,
        Commands\ProcessMaintenanceFee::class,
        Commands\MonthlyMassReports::class,
        FollowUpReminder::class,
    ];
    protected function schedule(Schedule $schedule)
    {
          $schedule->command('recurringbill:cron')
             ->everyMinute()->withoutOverlapping();
        //   $schedule->command('recurringnotify:cron')
        //      ->daily()->withoutOverlapping();
        //   $schedule->command('process_maintenance_fee:cron')
        //      ->daily()->withoutOverlapping();
        // $schedule->command('monthly_mass_report:cron')
        //       ->daily()->withoutOverlapping();

        $schedule->command('renewal:charge')->daily();
        $schedule->command('followup:reminder')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
