<?php

namespace Domain\Contact\DataTransferObjects;

use Domain\Account\Models\User;
use Domain\Contact\Models\Category;
use Domain\Contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Spatie\LaravelData\Data;
use Domain\Contact\Enums\Contact\ContactStatus;

final class ContactData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $title,
        public readonly ?string $name,
        public readonly ?string $description,
        public readonly ?string $address,
        public readonly string $phone,
        public readonly ?string $instagram,
        public readonly ?string $telegram,
        public readonly ?string $whatsapp,
        public readonly ?string $site,
        public readonly string $status,
        #[Exists(User::class)]
        public readonly ?int $user_id,
        #[Exists(Category::class)]
        public readonly int $category_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:contacts'],
            'name' => ['nullable', 'sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'sometimes', 'string', 'max:4096'],
            'address' => ['nullable', 'sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string', 'max:12'],
            'instagram' => ['nullable', 'sometimes', 'string', 'max:255'],
            'telegram' => ['nullable', 'sometimes', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'sometimes', 'string', 'max:255'],
            'site' => ['nullable', 'sometimes', 'string', 'max:255'],
            'status' => ['required', new Enum(ContactStatus::class)],
            'user_id' => ['sometimes'],
            'category_id' => ['required'],
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'title' => $request->title,
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'instagram' => $request->instagram,
            'telegram' => $request->telegram,
            'whatsapp' => $request->whatsapp,
            'site' => $request->site,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);
    }
}
