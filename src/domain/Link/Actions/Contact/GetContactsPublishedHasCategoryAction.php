<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

final class GetContactsPublishedHasCategoryAction
{
    /**
     * @param $category
     * @return Collection
     */
    public static function execute($category): Collection
    {
        $contacts = Contact::where('category_id', '=', $category)
            ->where('status', 'published')
            ->get();

        return $contacts;
    }
}
