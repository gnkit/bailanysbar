<?php

namespace Domain\Link\Services\Image;

use Domain\Link\Enums\Contact\ContactImageDefault;
use Domain\Link\Models\Contact;
use Illuminate\Http\Request;

final class ImageUploadContactService
{
    /**
     * @return mixed|string
     */
    public function upload(Request $request, ?Contact $contact)
    {
        if ($contact === null) {

            if ($request->hasFile('image')) {

                return $this->store($request, $contact);

            } else {

                return ContactImageDefault::PATH->value;
            }

        } else {

            if ($request->hasFile('image')) {

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

        $file = $request->file('image');
        $name = $file->hashName();
        $file->storeAs('public/images', $name);

        return $name;
    }
}
