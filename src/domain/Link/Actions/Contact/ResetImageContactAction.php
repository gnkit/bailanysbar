<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;

final class ResetImageContactAction
{
    /**
     * @param Contact $contact
     * @param string $image
     * @return Contact
     */
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
