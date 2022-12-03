<?php

namespace DBDesigner\DatabaseDesigner;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use DBDesigner\DatabaseDesigner\Commands\DatabaseDesignerCommand;

class DatabaseDesignerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-database-designer')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(DatabaseDesignerCommand::class);
    }
}
