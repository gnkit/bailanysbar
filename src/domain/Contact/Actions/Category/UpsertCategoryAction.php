<?php

namespace Domain\Contact\Actions\Category;

use Domain\Contact\DataTransferObjects\CategoryData;
use Domain\Contact\Models\Category;
use Illuminate\Support\Str;

final class UpsertCategoryAction
{
    /**
     * @param CategoryData $data
     * @return mixed
     */
    public static function execute(CategoryData $data)
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

        if ($category->wasRecentlyCreated) {
            return false;
        }

        return $category;

    }
}
