<?php

namespace Domain\Contact\Actions\Category;

use Domain\Contact\Models\Category;

final class DeleteCategoryAction
{
    /**
     * @param Category $category
     * @return void
     * @throws \Exception
     */
    public static function execute(Category $category)
    {
        $category = Category::findOrFail($category->id);

        if ($category->id === 1) {
            throw new \Exception('The category cannot be deleted');
        }

        if ($category->children) {
            foreach ($category->children as $child) {
                foreach ($child->contacts as $contact) {
                    $contact->update([
                        'category_id' => 1 ?? $category->parent->id,
                    ]);
                }
            }
            $category->children()->delete();
        }
        if ($category->parent) {
            foreach ($category->contacts as $contact) {
                $contact->update([
                    'category_id' => 1 ?? $category->parent->id,
                ]);
            }
        }

        foreach ($category->contacts as $contact) {
            $contact->update([
                'category_id' => 1,
            ]);
        }
        $category->delete();
    }
}
