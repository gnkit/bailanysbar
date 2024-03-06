<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;
use Illuminate\Pagination\Paginator;

final class GetOwnContactsPaginationAction
{
    public static function execute($quantity): Paginator
    {
        $contacts = Contact::where('user_id', '=', auth()->id())
            ->orderByDesc('created_at')
            ->select('id', 'title', 'status')
            ->simplePaginate($quantity);

        return $contacts;
    }
}
