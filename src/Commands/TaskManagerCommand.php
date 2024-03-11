<?php

namespace Vendor\TaskManager\Commands;

use Illuminate\Console\Command;

class TaskManagerCommand extends Command
{
    public $signature = 'laravel-task-manager';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
