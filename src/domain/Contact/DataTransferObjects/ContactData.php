<?php

namespace Domain\Contact\DataTransferObjects;

use Domain\Account\Models\User;
use Domain\Contact\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\Exists;
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
        #[Enum(ContactStatus::class)]
        public readonly ContactStatus $status,
        #[Exists(User::class)]
        public readonly int $user_id,
        #[Exists(Category::class)]
        public readonly int $category_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('contacts', 'title')->ignore(request()->contact)],
            'name' => ['nullable', 'sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'sometimes', 'string', 'max:4096'],
            'address' => ['nullable', 'sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string', 'max:12'],
            'instagram' => ['nullable', 'sometimes', 'string', 'max:255'],
            'telegram' => ['nullable', 'sometimes', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'sometimes', 'string', 'max:255'],
            'site' => ['nullable', 'sometimes', 'string', 'max:255'],
            'status' => ['sometimes', new Enum(ContactStatus::class)],
            'user_id' => ['sometimes'],
            'category_id' => ['required'],
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => intval($request->contact) ?? null,
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
            'user_id' => $request->user_id ?? auth()->id(),
            'category_id' => $request->category_id,
        ]);
    }
}
