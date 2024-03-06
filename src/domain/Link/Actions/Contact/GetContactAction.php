<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;

final class GetContactAction
{
    public static function execute(Contact $contact): Contact
    {
        $contact = Contact::findOrFail($contact->id);

        return $contact;
    }
}
