<?php

namespace App\Console;

use App\Models\DiscountPaid;
use App\Models\PasswordAuthentications;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('model:prune', [
            '--model' => [
                DiscountPaid::class,
                PasswordAuthentications::class
            ]
        ])->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
