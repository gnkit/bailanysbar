<?php

namespace Domain\Link\Actions\Contact;

use Domain\Account\Models\User;
use Domain\Link\DataTransferObjects\ContactData;
use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Link\Models\Contact;
use Domain\Payment\Actions\Ticket\CalculateTicketAction;

final class UpsertContactAction
{
    public static function execute(ContactData $data, User $user): Contact
    {
        $contact = Contact::updateOrCreate(
            [
                'id' => $data->id,
            ],
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
                'user_id' => $data->user_id ?? $user->id,
                'category_id' => $data->category_id,
                'image' => $data->image,
            ],
        );

        if (auth()->user()->isManager() && $data->status === ContactStatus::PUBLISHED) {
            CalculateTicketAction::execute($user);
        }

        return $contact;
    }
}
