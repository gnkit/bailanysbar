<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;

final class GetAllParentCategoriesPaginationAction
{
    public static function execute($quantity): Paginator
    {
        $categories = Category::with('parent', 'children')
            ->select('id', 'name', 'name_en', 'name_ru', 'icon', 'color')
            ->orderByDesc('created_at')
            ->simplePaginate($quantity);

        return $categories;
    }
}
