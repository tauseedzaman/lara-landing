<?php

namespace Tauseedzaman\LaraLanding;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tauseedzaman\LaraLanding\Commands\LaraLandingCommand;

class LaraLandingServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lara-landing')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_lara_landing_table')
            ->hasCommand(LaraLandingCommand::class);
    }
}
