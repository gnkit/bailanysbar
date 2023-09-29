<?php

namespace Domain\Link\Services\Notification;

use App\Notifications\ContactCreated;
use Domain\Account\Models\User;
use Illuminate\Support\Facades\Notification;

final class NotificationContactService
{
    /**
     * @param $contact
     * @return void
     */
    public function sendNotificationContactCreatedToManager($contact)
    {
        $user = new User;

        Notification::send($user->managers(), new ContactCreated($contact));
    }

    /**
     * @param $contact
     * @return true|void
     */
    public function readNotificationContact($contact)
    {
        $notifications = auth()->user()->unreadNotifications;

        foreach ($notifications as $notification) {
            if ($notification->data['contact_id'] === $contact->id) {
                $notification->markAsRead();

                return true;
            };
        }
    }
}
