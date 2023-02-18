<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\Models\Category;
use Illuminate\Pagination\Paginator;

final class GetAllParentCategoriesPaginationAction
{
    /**
     * @param $quantity
     * @return Paginator
     */
    public static function execute($quantity): Paginator
    {
        $categories = Category::where('parent_id', '=', null)
            ->select('id', 'name')
            ->orderByDesc('created_at')
            ->simplePaginate($quantity);

        return $categories;
    }
}
