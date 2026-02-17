<?php

namespace Domain\Link\Services\Image;

use Domain\Link\Enums\Contact\ContactImageDefault;
use Domain\Link\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

final class ImageUploadContactService
{
    public function upload(Request $request, ?Contact $contact): string
    {
        if ($request->filled('image')) {
            return $this->store($request, $contact);
        }

        if ($contact !== null) {
            return $contact->image;
        }

        return ContactImageDefault::PATH->value;
    }

    public function reset(Contact $contact): string
    {
        $this->destroy($contact);

        return ContactImageDefault::PATH->value;
    }

    public function destroy(Contact $contact): void
    {
        if ($contact->image !== ContactImageDefault::PATH->value) {
            $filename = basename($contact->image); // защита от traversal
            if (Storage::disk('public')->exists('/images/'.$filename)) {
                Storage::disk('public')->delete('/images/'.$filename);
            }
        }
    }

    private function store(Request $request, ?Contact $contact): string
    {
        if ($contact !== null) {
            $this->destroy($contact);
        }

        /** @var string $image64 */
        $image64 = $request->input('image');

        $mimeType = mime_content_type($image64);

        if ($mimeType === false) {
            $extension = 'png';
        } else {
            $extension = explode('/', $mimeType)[1];
        }

        $base64String = preg_replace('#^data:image/\w+;base64,#i', '', $image64) ?? '';
        $file = base64_decode($base64String);

        $imageName = auth()->id().'-'.time().'.'.$extension;

        Storage::disk('public')->put('/images/'.$imageName, $file);

        return $imageName;
    }
}
