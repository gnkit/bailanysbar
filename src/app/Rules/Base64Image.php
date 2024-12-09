<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Base64Image implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // dd(!preg_match('/^data:image\/(\w+);base64,/', $value),$attribute, $value);
        if (! preg_match('/^data:image\/(\w+);base64,/', $value)) {
            return false;
        }

        [$type, $data] = explode(';', $value);
        [, $data] = explode(',', $data);

        if (! in_array($type, ['data:image/png', 'data:image/png', 'data:image/jpeg', 'data:image/gif'])) {
            return false;
        }

        if (strlen(base64_decode($data)) > 2 * 1024 * 1024) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('messages.check_base64_image');
    }
}
