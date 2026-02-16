<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;

final class DeleteContactAction
{
    public static function execute(Contact $contact): void
    {
        $contact = Contact::findOrFail($contact->id);
        $contact->delete();
    }
}
