<?php

namespace Domain\Link\Actions\Contact;

use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Link\Models\Contact;
use Illuminate\Http\JsonResponse;

final class GetAllContactsPublishedAction
{
    public static function execute(): JsonResponse
    {
        $contacts = Contact::select('id', 'title')
            ->where('status', '=', ContactStatus::PUBLISHED)
            ->get();

        return response()->json($contacts);
    }
}
