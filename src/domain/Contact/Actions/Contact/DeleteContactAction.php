<?php

namespace Domain\Contact\Actions\Contact;

use Domain\Contact\Models\Contact;

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
