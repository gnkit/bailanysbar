<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;

final class DeleteContactAction
{
    /**
     * @param Contact $contact
     * @return void
     */
    public static function execute(Contact $contact)
    {
        $contact = Contact::findOrFail($contact->id);
        $contact->delete();
    }
}
