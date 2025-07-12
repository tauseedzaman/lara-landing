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
            ->hasViews('lara-landing')
            ->hasMigrations([
                '2025_06_06_123546_create_landing_pages_table',
                '2025_06_06_123701_create_landing_sections_table',
                '2025_06_12_080041_change_content_from_json_to_string_in_landing_sections_table',
            ])
            ->hasCommand(LaraLandingCommand::class)
            ->hasRoute('web');
    }
}
