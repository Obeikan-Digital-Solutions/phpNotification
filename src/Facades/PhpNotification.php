<?php

namespace ObeikanDigitalSolutions\PhpNotification\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ObeikanDigitalSolutions\PhpNotification\PhpNotification
 */
class PhpNotification extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ObeikanDigitalSolutions\PhpNotification\PhpNotification::class;
    }
}
