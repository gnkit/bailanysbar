<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\Models\Category;
use Illuminate\Database\Eloquent\Collection;

final class GetAllParentCategoriesAction
{
    /**
     * @return Collection
     */
    public static function execute(): Collection
    {
        $categories = Category::where('parent_id', '=', null)
            ->select('id', 'name', 'name_en', 'name_ru', 'icon')
            ->orderByDesc('created_at')
            ->get();

        return $categories;
    }
}
