<?php

namespace ObeikanDigitalSolutions\PhpNotification;

use Illuminate\Notifications\RoutesNotifications;
use ObeikanDigitalSolutions\PhpNotification\HasDatabaseNotifications;

trait CustomNotifiable
{
    use HasDatabaseNotifications, RoutesNotifications;
}
