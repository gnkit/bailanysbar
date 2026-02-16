<?php

namespace App\Http\Controllers\Link\Contact;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Contact\ResetImageContactAction;
use Domain\Link\Models\Contact;
use Domain\Link\Services\Image\ImageUploadContactService;
use Illuminate\Http\RedirectResponse;

class ImageUploadContactServiceController extends Controller
{
    public function __construct(private readonly ImageUploadContactService $imageUploadContactService) {}

    public function reset(Contact $contact): RedirectResponse
    {
        $image = $this->imageUploadContactService->reset($contact);
        ResetImageContactAction::execute($contact, $image);

        return redirect()->back()->with('success', 'Image reset successfully.');
    }
}
