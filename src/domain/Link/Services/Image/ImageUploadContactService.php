<?php

namespace Domain\Link\Services\Image;

use Domain\Link\Enums\Contact\ContactImageDefault;
use Domain\Link\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

final class ImageUploadContactService
{
    /**
     * @return mixed|string
     */
    public function upload(Request $request, ?Contact $contact)
    {
        if ($contact === null) {

            if ($request->has('image')) {

                return $this->store($request, $contact);
            } else {

                return ContactImageDefault::PATH->value;
            }
        } else {

            if ($request->has('image') && (! is_null($request->image))) {

                return $this->store($request, $contact);
            } else {

                return $contact->image;
            }
        }
    }

    /**
     * @return string|void
     */
    public function reset(Contact $contact)
    {
        if ($contact->image !== ContactImageDefault::PATH->value) {

            $image_path = (public_path('storage').'/images/'.$contact->image);

            if (file_exists($image_path)) {
                unlink($image_path);

                return ContactImageDefault::PATH->value;
            }
        } else {

            return ContactImageDefault::PATH->value;
        }
    }

    /**
     * @return void
     */
    public function destroy(Contact $contact)
    {
        if ($contact->image !== ContactImageDefault::PATH->value) {

            $image_path = (public_path('storage').'/images/'.$contact->image);

            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    }

    /**
     * @return string
     */
    private function store(Request $request, ?Contact $contact)
    {
        if ($contact !== null) {
            $this->destroy($contact);
        }

        $image_64 = $request->image;
        $extension = explode('/', mime_content_type($image_64))[1];
        $file = base64_decode(preg_replace(
            '#^data:image/\w+;base64,#i',
            '',
            $request->input('image')
        ));
        $imageName = auth()->id().'-'.time().'.'.$extension;

        Storage::disk('public')->put('/images/'.$imageName, $file);

        return $imageName;
    }
}
