<?php

namespace Domain\Contact\Actions\Category;

use Domain\Contact\Models\Category;
use Domain\Contact\Models\Contact;

final class DeleteCategoryAction
{
    /**
     * @param Category $category
     * @return true
     */
    public static function execute(Category $category)
    {
        $category = Category::findOrFail($category->id);
        $contacts = Contact::where('category_id', '=', $category->id)->get();

        foreach ($contacts as $contact) {
            if ($category->parent) {
                $contact->update([
                    'category_id' => $category->parent->id,
                ]);
            } else {
                $contact->update([
                    'category_id' => null,
                ]);
            }
        }

        $category->delete();

        return true;
    }
}
