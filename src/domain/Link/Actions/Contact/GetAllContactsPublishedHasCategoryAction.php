<?php

namespace Domain\Link\Actions\Contact;

final class GetAllContactsPublishedHasCategoryAction
{
    public static function execute($category): array
    {
        $contacts = [];
        if ($category->children()->count() > 0) {
            foreach ($category->children as $child) {
                $contacts[] = GetContactsPublishedHasCategoryAction::execute($child->id);
            }
        }
        $contacts[] = GetContactsPublishedHasCategoryAction::execute($category->id);

        return $contacts;
    }
}
