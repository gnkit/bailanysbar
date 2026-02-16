<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Models\Category;
use Domain\Link\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

final class GetAllContactsPublishedHasCategoryAction
{
    /** @return array<int, Collection<int, Contact>> */
    public static function execute(Category $category): array
    {
        $contacts = [];
        if ($category->children()->count() > 0) {
            foreach ($category->children as $child) {
                $contacts[] = GetContactsPublishedHasCategoryAction::execute($child->id);
            }
        }
        $contacts[] = GetContactsPublishedHasCategoryAction::execute($category->id);

        return $contacts;
    }
}
