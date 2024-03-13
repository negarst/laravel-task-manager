<?php

namespace Negarst\TaskManager\Jobs;

use App\Mail\DeadlineNotificationEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Negarst\TaskManager\Models\Task;

class DeadlineNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $deadline;

    public function __construct($deadline)
    {
        $this->deadline = $deadline;
    }

    public function handle()
    {

        $tasks = Task::with('user')
            ->where('due_date', '>', now())
            ->where('due_date', '<', $this->deadline)
            ->get();

        // Extract email addresses of users who own these tasks
        $userEmails = $tasks->pluck('user.email');

        $uniqueUserEmails = $userEmails->unique();

        $uniqueUserEmailsArray = $uniqueUserEmails->toArray();

        foreach ($uniqueUserEmailsArray as $email) {
            Mail::to($email)->send(new DeadlineNotificationEmail());
        }
    }
}
