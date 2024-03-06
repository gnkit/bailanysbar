<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;

final class ResetImageContactAction
{
    public static function execute(Contact $contact, string $image): Contact
    {
        $contact = Contact::updateOrCreate(
            [
                'id' => $contact->id,
            ],
            [
                'image' => $image,
            ],
        );

        return $contact;
    }
}
