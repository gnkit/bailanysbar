<?php

namespace Domain\Link\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Illuminate\Validation\Rule;

final class CategoryData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly ?string $slug,
        public readonly ?string $icon,
        public readonly ?int $parent_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('categories')->ignore(request('category'))],
            'icon' => ['nullable', 'sometimes', 'string'],
            'parent_id' => ['nullable', 'sometimes', 'int', 'different:id'],
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => $request->category ?? null,
            'name' => $request->name,
            'icon' => $request->icon,
            'parent_id' => $request->parent_id,
        ]);
    }
}
