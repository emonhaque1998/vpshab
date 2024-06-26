<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('queue:work --queue=high,default --stop-when-empty')
        //  ->everyMinute()
        //  ->withoutOverlapping();

        $schedule->command("app:chack-unpaid-send-email")->daily()->withoutOverlapping();

        $schedule->command("app:before-seven-days-order-change")->everyMinute();

        $schedule->command("app:before-five-days-create-invoice")->everyMinute();

        $schedule->command('expire:records')->everyMinute();
        
        $schedule->command("app:delete-expire-order")->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
