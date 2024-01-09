<?php

namespace ObeikanDigitalSolutions\PhpNotification;

use Illuminate\Notifications\RoutesNotifications;

trait CustomNotifiable
{
    use HasDatabaseNotifications, RoutesNotifications;
}
