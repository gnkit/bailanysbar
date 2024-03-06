<?php

namespace Domain\Link\Services\Notification;

use Domain\Account\Models\User;
use Domain\Link\Notifications\ContactCreated;
use Domain\Link\Notifications\ContactUpdated;
use Illuminate\Support\Facades\Notification;

final class NotificationContactService
{
    /**
     * @return void
     */
    public function sendNotificationContactCreatedToManager($contact)
    {
        $user = new User;

        Notification::send($user->managers(), new ContactCreated($contact));
    }

    /**
     * @return void
     */
    public function sendNotificationContactUpdatedToManager($contact)
    {
        $user = new User;

        Notification::send($user->managers(), new ContactUpdated($contact));
    }

    /**
     * @return true|void
     */
    public function readNotificationContact($contact)
    {
        $notifications = auth()->user()->unreadNotifications;

        foreach ($notifications as $notification) {
            if ($notification->data['contact_id'] === $contact->id) {
                $notification->markAsRead();

                return true;
            }
        }
    }
}
