<?php

namespace App\Http\Controllers\Link\Contact;

use App\Http\Controllers\Controller;
use Domain\Link\Actions\Contact\ResetImageContactAction;
use Domain\Link\Models\Contact;
use Domain\Link\Services\Image\ImageUploadContactService;

class ImageUploadContactServiceController extends Controller
{
    public function __construct(private ImageUploadContactService $imageUploadContactService)
    {
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Contact $contact)
    {
        $image = $this->imageUploadContactService->reset($contact);
        ResetImageContactAction::execute($contact, $image);

        return redirect()->back()->with('success', 'Image reset successfully.');
    }
}
