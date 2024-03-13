<?php

use Negarst\TaskManager\Jobs\DeadlineNotificationJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(DeadlineNotificationJob::class)->dailyAt('8:00');
    }
}
