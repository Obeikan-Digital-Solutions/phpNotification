<?php

namespace ObeikanDigitalSolutions\PhpNotification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotifictionsControlle extends Controller
{
    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
