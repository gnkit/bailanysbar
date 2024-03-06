<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\DataTransferObjects\CategoryData;
use Domain\Link\Models\Category;
use Illuminate\Support\Str;

final class UpsertCategoryAction
{
    public static function execute(CategoryData $data): Category
    {
        $category = Category::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
                'name_en' => $data->name_en,
                'name_ru' => $data->name_ru,
                'slug' => Str::slug($data->name),
                'icon' => $data->icon,
                'parent_id' => $data->parent_id,
            ],
        );

        return $category;
    }
}
