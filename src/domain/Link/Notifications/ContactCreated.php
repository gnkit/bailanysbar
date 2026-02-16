<?php

namespace Domain\Link\Notifications;

use Domain\Link\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ContactCreated extends Notification
{
    use Queueable;

    private Contact $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /** @return array<int,string> */
    public function via(mixed $notifiable): array
    {
        return ['database'];
    }

    /** @return array{contact_id:int} */
    public function toArray(mixed $notifiable): array
    {
        return [
            'contact_id' => $this->contact->id,
        ];
    }
}
