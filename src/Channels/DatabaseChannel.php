<?php

namespace ObeikanDigitalSolutions\PhpNotification\Channels;

use Illuminate\Notifications\Notification;
use ObeikanDigitalSolutions\PhpNotification\PhpNotification;
use RuntimeException;

class DatabaseChannel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function send($notifiable, PhpNotification $notification)
    {
        return $notifiable->routeNotificationFor('database', $notification)->create(
            $this->buildPayload($notifiable, $notification)
        );
    }

    /**
     * Build an array payload for the DatabaseNotification Model.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return array
     */
    protected function buildPayload($notifiable, PhpNotification $notification)
    {
        // [id]
        //      ,[compId]
        //      ,[toUser]
        //      ,[isGroup]
        //      ,[groupType]
        //      ,[groupMembers]
        //      ,[sendToEmail]
        //      ,[Sender]
        //      ,[notificationType]
        //      ,[notificationTitle]
        //      ,[notificationDesc]
        //      ,[isRead]
        //      ,[createDate]
        //      ,[modifiDate]
        //      ,[expDate]
        //      ,[link]
        //      ,[module]
        //      ,[deliveryStatus]
        //      ,[importanceLevel]
        //      ,[isSensitive]
        return [
            "compId" => auth()->user()->t_comp,
            "isGroup" => '0',
            "groupType" => '',
            "groupMembers" => "",
            "sendToEmail" => "",
            "notificationType" => "0",
            "notificationTitle" => $this->getData($notifiable, $notification)["subject"],
            "notificationDesc" => $this->getData($notifiable, $notification)["message"],
            "isRead" => "0",
            "createDate" => now(),
            "modifiDate" => now(),
            "expDate" => now()->addMonth(1),
            "link" => array_key_exists('link', $this->getData($notifiable, $notification)) ? $this->getData($notifiable, $notification)["link"] : "",
            "module" => config('phpnotification.module', ''),
            "deliveryStatus" => "1",
            "importanceLevel" => "",
            "isSensitive" => "",
            "Sender" => auth()->user()->t_idno
        ];
    }

    /**
     * Get the data for the notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     * @return array
     *
     * @throws \RuntimeException
     */
    protected function getData($notifiable, PhpNotification $notification)
    {
        if (method_exists($notification, 'toDatabase')) {
            return is_array($data = $notification->toDatabase($notifiable))
                ? $data : $data->data;
        }

        if (method_exists($notification, 'toArray')) {
            return $notification->toArray($notifiable);
        }

        throw new RuntimeException('Notification is missing toDatabase / toArray method.');
    }
}
