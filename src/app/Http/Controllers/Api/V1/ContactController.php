<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Contact\GetAllContactsPublishedAction;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function index(): JsonResponse
    {
        return GetAllContactsPublishedAction::execute();
    }
}
