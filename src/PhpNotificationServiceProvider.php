<?php

namespace ObeikanDigitalSolutions\PhpNotification;

use Illuminate\Contracts\Notifications\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Notifications\Factory as FactoryContract;
use ObeikanDigitalSolutions\PhpNotification\ChannelManager;
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


    public function register()
    {
        parent::register();

        $this->app->singleton(ChannelManager::class, function ($app) {
            return new ChannelManager($app);
        });

        $this->app->alias(
            ChannelManager::class, DispatcherContract::class
        );

        $this->app->alias(
            ChannelManager::class, FactoryContract::class
        );
    }

}
