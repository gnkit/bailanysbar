<?php

namespace Domain\Contact\Actions\Category;

use Domain\Contact\Models\Category;
use Illuminate\Database\Eloquent\Collection;

final class GetAllParentCategoriesAction
{
    /**
     * @return Collection
     */
    public static function execute(): Collection
    {
        $categories = Category::where('parent_id', '=', null)
            ->select('id', 'name')
            ->orderByDesc('created_at')
            ->get();

        return $categories;
    }
}
