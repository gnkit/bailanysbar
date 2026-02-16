<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;
use Illuminate\Pagination\Paginator;

final class GetOwnContactsPaginationAction
{
    /** @return Paginator<int, Contact> */
    public static function execute(int $quantity): Paginator
    {
        /** @var Paginator<int, Contact> $contacts */
        $contacts = Contact::where('user_id', '=', auth()->id())
            ->orderByDesc('created_at')
            ->select('id', 'title', 'status')
            ->simplePaginate($quantity);

        return $contacts;
    }
}
