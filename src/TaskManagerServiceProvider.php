<?php

namespace Negarst\TaskManager;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Negarst\TaskManager\Commands\TaskManagerCommand;
use Negarst\TaskManager\Models\Task;
use Negarst\TaskManager\Repositories\TaskRepository;

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
        parent::register(); // Call the parent register() method to properly initialize $package

        $this->app->singleton(TaskRepository::class, function ($app) {
            return new TaskRepository(new Task());
        });
    }
}
