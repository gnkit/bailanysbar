<?php

namespace Domain\Contact\Actions\Contact;

use Domain\Contact\Models\Contact;
use Illuminate\Pagination\Paginator;

final class GetOwnContactsPaginationAction
{
    /**
     * @param $quantity
     * @return Paginator
     */
    public static function execute($quantity): Paginator
    {
        $contacts = Contact::where('user_id', '=', auth()->id())
            ->orderByDesc('created_at')
            ->select('id', 'title', 'status')
            ->simplePaginate($quantity);

        return $contacts;
    }
}