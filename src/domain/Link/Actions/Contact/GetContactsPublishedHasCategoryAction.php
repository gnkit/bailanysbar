<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Link\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

final class GetContactsPublishedHasCategoryAction
{
    public static function execute($category): Collection
    {
        $contacts = Contact::where('status', '=', ContactStatus::PUBLISHED)->with('category')->whereHas('category', function ($query) use ($category) {
            $query->where('id', '=', $category);
        })->get();

        return $contacts;
    }
}
