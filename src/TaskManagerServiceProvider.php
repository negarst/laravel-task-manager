<?php

namespace Vendor\TaskManager;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vendor\TaskManager\Commands\TaskManagerCommand;
use Vendor\TaskManager\Models\Task;
use Vendor\TaskManager\Repositories\TaskRepository;

class TaskManagerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-task-manager')
            ->hasConfigFile()
            ->hasMigration('create_tasks_table')
            ->hasCommand(TaskManagerCommand::class);
    }

    public function register()
    {
        // Bind TaskRepository with Task model
        $this->app->bind(TaskRepository::class, function ($app) {
            return new TaskRepository(new Task());
        });
    }
}
