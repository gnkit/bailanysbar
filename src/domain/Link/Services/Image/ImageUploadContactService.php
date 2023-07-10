<?php

namespace Domain\Link\Services\Image;

use Illuminate\Http\Request;
use Domain\Link\Models\Contact;
use Domain\Link\Enums\Contact\ContactImageDefault;

final class ImageUploadContactService
{
    /**
     * @param Request $request
     * @param Contact|null $contact
     * @return mixed|string
     */
    public function upload(Request $request, ?Contact $contact)
    {
        if (null === $contact) {

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
     * @param Contact $contact
     * @return string|void
     */
    public function reset(Contact $contact)
    {
        if ($contact->image !== ContactImageDefault::PATH->value) {

            $image_path = (public_path('storage') . '/images/' . $contact->image);

            if (file_exists($image_path)) {
                unlink($image_path);

                return ContactImageDefault::PATH->value;
            }
        } else {

            return ContactImageDefault::PATH->value;
        }

    }

    /**
     * @param Contact $contact
     * @return void
     */
    public function destroy(Contact $contact)
    {
        if ($contact->image !== ContactImageDefault::PATH->value) {

            $image_path = (public_path('storage') . '/images/' . $contact->image);

            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    }

    /**
     * @param Request $request
     * @param Contact|null $contact
     * @return string
     */
    private function store(Request $request, ?Contact $contact)
    {
        if (null !== $contact) {
            $this->destroy($contact);
        }

        $file = $request->file('image');
        $name = $file->hashName();
        $file->storeAs('public/images', $name);

        return $name;
    }
}
