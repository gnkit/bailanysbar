<?php

namespace Domain\Contact\Actions\Category;

use Domain\Contact\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class GetAllCategoriesAction
{
    /**
     * @return Collection
     */
    public static function execute(): Collection
    {
        $categories = Category::select('id', 'name')->get();

        return $categories;
    }
}
