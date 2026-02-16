<?php

namespace Domain\Link\Services\Notification;

use Domain\Account\Models\User;
use Domain\Link\Models\Contact;
use Domain\Link\Notifications\ContactCreated;
use Domain\Link\Notifications\ContactUpdated;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Facades\Notification;

final class NotificationContactService
{
    public function sendNotificationContactCreatedToManager(Contact $contact): void
    {
        $user = new User;

        Notification::send($user->managers(), new ContactCreated($contact));
    }

    public function sendNotificationContactUpdatedToManager(Contact $contact): void
    {
        $user = new User;

        Notification::send($user->managers(), new ContactUpdated($contact));
    }

    public function readNotificationContact(Contact $contact): bool
    {
        /** @var User|null $currentUser */
        $currentUser = auth()->user();

        if ($currentUser === null) {
            return false;
        }

        /** @var DatabaseNotificationCollection<int, DatabaseNotification> $notifications */
        $notifications = $currentUser->unreadNotifications()->get();

        /** @var DatabaseNotification $notification */
        foreach ($notifications as $notification) {
            if (isset($notification->data['contact_id']) && $notification->data['contact_id'] === $contact->id) {
                $notification->markAsRead();

                return true;
            }
        }

        return false;
    }
}
