<?php

namespace Domain\Contact\Actions\Contact;

use Domain\Contact\Models\Contact;
use Illuminate\Pagination\Paginator;

class GetAllContactsAction
{
    /**
     * @param $quantity
     * @return Paginator
     */
    public static function execute($quantity): Paginator
    {
        $contacts = Contact::select('id', 'title', 'status')
            ->orderByDesc('created_at')
            ->simplePaginate($quantity);

        return $contacts;
    }
}
