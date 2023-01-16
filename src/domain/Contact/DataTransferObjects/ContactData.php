<?php

namespace Domain\Contact\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Illuminate\Validation\Rule;

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
        public readonly int $category_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max255'],
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string', 'max:2048'],
            'address' => ['sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string', 'max:255'],
            'instagram' => ['sometimes', 'string', 'max:255'],
            'telegram' => ['sometimes', 'string', 'max:255'],
            'whatsapp' => ['sometimes', 'string', 'max:255'],
            'site' => ['sometimes', 'string', 'max:255'],
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
            'category_id' => $request->category_id,
        ]);
    }
}
