<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;

final class GetContactAction
{
    public static function execute(Contact $contact): Contact
    {
        return Contact::findOrFail($contact->id);
    }
}
