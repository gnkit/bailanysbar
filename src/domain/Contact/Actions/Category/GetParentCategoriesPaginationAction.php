<?php

namespace Domain\Contact\Actions\Category;

use Domain\Contact\Models\Category;
use Illuminate\Pagination\Paginator;

final class GetParentCategoriesPaginationAction
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
