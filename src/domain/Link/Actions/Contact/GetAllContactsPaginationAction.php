<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;
use Illuminate\Pagination\Paginator;

final class GetAllContactsPaginationAction
{
    /** @return Paginator<int, Contact> */
    public static function execute(int $quantity): Paginator
    {
        /** @var Paginator<int, Contact> $contacts */
        $contacts = Contact::select('id', 'title', 'status', 'category_id')
            ->orderByDesc('created_at')
            ->simplePaginate($quantity);

        return $contacts;
    }
}
