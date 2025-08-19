<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\CheckMatureInvestments::class,
        \App\Console\Commands\ProcessDailyInterest::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('investments:check-mature')->daily();
        $schedule->command('investments:process-daily-interest')->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
