<?php

namespace Domain\Link\Services\Image;

use Illuminate\Http\Request;
use Domain\Link\Models\Contact;
use Domain\Link\Enums\Contact\ContactImageDefault;

final class ImageUploadContactService
{
    public function upload(Request $request, ?Contact $contact)
    {
        if (null !== $contact) {
            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $name = $file->hashName();
                $file->storeAs('public/images', $name);

                $this->delete($contact);

                return $name;

            } else {

                return $contact->image;
            }

        } else {

            return ContactImageDefault::PATH->value;
        }
    }

    public function delete(Contact $contact) {

        if ($contact->image !== ContactImageDefault::PATH->value) {

            $image_path = ('public/images/' . $contact->image);

            if(file_exists($image_path)){
                unlink($image_path);
            }
        }

    }
}
