<?php

namespace Domain\Link\Actions\Category;

use Domain\Link\Models\Category;
use Exception;

final class DeleteCategoryAction
{
    /** @throws Exception */
    public static function execute(Category $category): void
    {
        if ($category->id === 1) {
            throw new Exception('The category cannot be deleted');
        }

        if ($category->children()->exists()) {
            foreach ($category->children as $child) {
                foreach ($child->contacts as $contact) {
                    $contact->update([
                        'category_id' => $category->parent_id ?? 1,
                    ]);
                }
            }
            $category->children()->delete();
        }

        $targetCategoryId = $category->parent_id ?? 1;

        foreach ($category->contacts as $contact) {
            $contact->update([
                'category_id' => $targetCategoryId,
            ]);
        }

        $category->delete();
    }
}
