<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\DataTransferObjects\CategoryData;
use Domain\Link\Models\Category;
use Illuminate\Support\Str;

final class UpsertCategoryAction
{
    /**
     * @param CategoryData $data
     * @return Category
     */
    public static function execute(CategoryData $data): Category
    {
        $category = Category::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
                'slug' => Str::slug($data->name),
                'parent_id' => $data->parent_id,
            ],
        );

        return $category;
    }
}
