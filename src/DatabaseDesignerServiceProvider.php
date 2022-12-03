<?php

namespace DBDesigner\DatabaseDesigner;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DatabaseDesignerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-database-designer')
            ->hasConfigFile()
            ->hasRoute('database-designer');
    }
}
