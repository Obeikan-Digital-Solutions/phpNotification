<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::post('/mark-as-read', [NotifictionsControlle::class, 'markNotification'])->name('mark.notification');
