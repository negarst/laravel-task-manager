<?php

namespace Vendor\TaskManager;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vendor\TaskManager\Commands\TaskManagerCommand;

class TaskManagerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-task-manager')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-task-manager_table')
            ->hasCommand(TaskManagerCommand::class);
    }
}