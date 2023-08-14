<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Link\Models\Category;

final class GetParentCategoriesHasContactPublishedAction
{
    /**
     * @return array
     */
    public static function execute(): array
    {
        $categoriesParent = Category::where('parent_id', '=', null)->get();

        $categories = [];
        foreach ($categoriesParent as $category) {
            if (0 < $category->contacts->count()) {
                foreach ($category->contacts as $contact) {
                    if ($contact->status === ContactStatus::PUBLISHED) {
                        $categories[] = $category;
                    }
                }
            }
        }

        return array_unique($categories);
    }
}
