<?php

use Illuminate\Support\Facades\Route;
use ObeikanDigitalSolutions\PhpNotification\NotifictionsControlle;

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::post('/mark-as-read', [NotifictionsControlle::class, 'markNotification'])->name('mark.notification');
});
