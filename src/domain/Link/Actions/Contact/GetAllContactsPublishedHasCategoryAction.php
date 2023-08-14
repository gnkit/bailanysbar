<?php

namespace Domain\Link\Actions\Contact;

final class GetAllContactsPublishedHasCategoryAction
{
    /**
     * @param $category
     * @return array
     */
    public static function execute($category): array
    {
        $contacts = [];
        if (0 < $category->children()->count()) {
            foreach ($category->children as $child) {
                $contacts[] = GetContactsPublishedHasCategoryAction::execute($child->id);
            }
        }
        $contacts[] = GetContactsPublishedHasCategoryAction::execute($category->id);

        return $contacts;
    }
}
