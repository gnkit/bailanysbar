<?php

namespace Domain\Link\Actions\Contact;

use Domain\Account\Models\User;
use Domain\Link\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

final class GetAllContactsByUserIdAction
{
    /** @return Collection<int, Contact> */
    public static function execute(User $user): Collection
    {
        /** @var Collection<int, Contact> $contacts */
        $contacts = Contact::where('user_id', '=', $user->id)
            ->orderByDesc('created_at')
            ->select('id', 'title', 'status')
            ->get();

        return $contacts;
    }
}
