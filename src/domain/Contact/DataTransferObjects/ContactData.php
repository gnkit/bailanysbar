<?php

namespace Domain\Contact\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Illuminate\Validation\Rule;
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
        public readonly ContactStatus $status,
        public readonly int $category_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max255'],
            'name' => ['nullable', 'sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'sometimes', 'string', 'max:2048'],
            'address' => ['nullable', 'sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string', 'max:255'],
            'instagram' => ['nullable', 'sometimes', 'string', 'max:255'],
            'telegram' => ['nullable', 'sometimes', 'string', 'max:255'],
            'whatsapp' => ['nullable', 'sometimes', 'string', 'max:255'],
            'site' => ['nullable', 'sometimes', 'string', 'max:255'],
            'status' => ['sometimes', 'nullable', new Enum(ContactStatus::class)],
            'category_id' => ['required', 'int'],
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
            'status' => $request->status ?? ContactStatus::DRAFT,
            'category_id' => $request->category_id,
        ]);
    }
}
