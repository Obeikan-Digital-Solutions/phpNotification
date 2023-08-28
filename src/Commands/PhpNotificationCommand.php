<?php

namespace ObeikanDigitalSolutions\PhpNotification\Commands;

use Illuminate\Console\Command;

class PhpNotificationCommand extends Command
{
    public $signature = 'phpnotification';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
