<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;
use Illuminate\Pagination\Paginator;

final class GetAllContactsPaginationAction
{
    public static function execute($quantity): Paginator
    {
        $contacts = Contact::select('id', 'title', 'status', 'category_id')
            ->orderByDesc('created_at')
            ->simplePaginate($quantity);

        return $contacts;
    }
}
