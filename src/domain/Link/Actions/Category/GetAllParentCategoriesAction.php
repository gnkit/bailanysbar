<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\Models\Category;
use Illuminate\Database\Eloquent\Collection;

final class GetAllParentCategoriesAction
{
    /** @return Collection<int, Category> */
    public static function execute(): Collection
    {
        /** @var Collection<int, Category> $categories */
        $categories = Category::with('children')
            ->where('parent_id', '=', null)
            ->select('id', 'name', 'name_en', 'name_ru', 'icon', 'color')
            ->orderByDesc('created_at')
            ->get();

        return $categories;
    }
}
