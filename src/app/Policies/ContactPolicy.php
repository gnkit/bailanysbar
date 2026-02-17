<?php

namespace App\Policies;

use Domain\Account\Models\User;
use Domain\Link\Models\Contact;

class ContactPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Contact $contact): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Contact $contact): bool
    {
        return $user->id === $contact->user_id || $user->isManager();
    }

    public function delete(User $user, Contact $contact): bool
    {
        return $user->id === $contact->user_id || $user->isManager();
    }

    public function restore(User $user, Contact $contact): bool
    {
        return false;
    }

    public function forceDelete(User $user, Contact $contact): bool
    {
        return false;
    }
}
