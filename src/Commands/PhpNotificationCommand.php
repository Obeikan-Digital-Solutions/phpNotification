<?php

namespace ObeikanDigitalSolutions\PhpNotification\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PhpNotificationCommand extends Command
{

    protected $signature = 'phpnotification:generate {name}';
    protected $description = 'Generate a PhpNotification class from a stub';

    public function handle()
    {
        $notificationName = $this->argument('name');
        $stubPath = (__DIR__ . '/../stubs/php_notification.stub');
        $notificationClassPath = app_path("Notifications\\".$notificationName.'.php');
    
        $stubContent = File::get($stubPath);
        $stubContent = str_replace('className', $notificationName, $stubContent);
        $destinationDirectory = app_path("Notifications");
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0755, true);
        }
        File::put($notificationClassPath, $stubContent);

        $this->info("{$notificationName}.php generated successfully!");
    }
}
