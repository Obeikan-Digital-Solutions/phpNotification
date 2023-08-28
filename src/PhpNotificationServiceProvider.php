<?php

namespace ObeikanDigitalSolutions\PhpNotification;

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ObeikanDigitalSolutions\PhpNotification\Commands\PhpNotificationCommand;

class PhpNotificationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('phpnotification')
            ->hasConfigFile()
            ->hasRoute('notification')
            ->hasViews()
            ->hasMigration('create_phpnotification_table')
            ->hasCommand(PhpNotificationCommand::class);
    }

}
