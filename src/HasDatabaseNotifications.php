<?php

namespace ObeikanDigitalSolutions\PhpNotification;

use Illuminate\Database\Eloquent\Builder;

trait HasDatabaseNotifications
{
    /**
     * Get the entity's notifications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notifications()
    {
        return $this->hasMany(PhpDatabaseNotification::class, 'toUser', 't_idno')
            ->where(function($query) {
                if (config('phpnotification.allModule')) {
                    return $query;
                }
                return $query->where('module', config('phpnotification.module'));
            })

            ->orderBy('createDate', 'desc');
    }

    /**
     * Get the entity's read notifications.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function readNotifications()
    {
        return $this->notifications()->read();
    }

    /**
     * Get the entity's unread notifications.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function unreadNotifications()
    {
        return $this->notifications()->unread();
    }

 

}
