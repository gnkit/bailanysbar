<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Link\Models\Category;
use Illuminate\Database\Eloquent\Collection;

final class GetParentCategoriesHasContactPublishedAction
{
    /**
     * @return Collection
     */
    public static function execute(): Collection
    {
        $categories = Category::where('parent_id', '=', null)->with('contacts')->whereHas('contacts', function ($query) {
            $query->where('status', '=', ContactStatus::PUBLISHED);
        })->get();

        return $categories;
    }
}
