<?php

namespace Domain\Contact\Actions\Contact;

use Domain\Account\Models\User;
use Domain\Contact\DataTransferObjects\ContactData;
use Domain\Contact\Models\Contact;

class UpsertContactAction
{
    /**
     * @param ContactData $data
     * @param User $user
     * @return mixed
     */
    public static function execute(ContactData $data, User $user)
    {
        $contact = Contact::updateOrCreate(
            ['id' => $data->id],
            [
                'title' => $data->title,
                'name' => $data->name,
                'description' => $data->description,
                'address' => $data->address,
                'phone' => $data->phone,
                'instagram' => $data->instagram,
                'telegram' => $data->telegram,
                'whatsapp' => $data->whatsapp,
                'site' => $data->site,
                'status' => $data->status,
                'user_id' => $user->id,
                'category_id' => $data->category_id,
            ],
        );

        if ($contact->wasRecentlyCreated) {
            return redirect()->back()->withMessage('error', 'Contact dont created.');
        }
        return $contact;
    }
}
