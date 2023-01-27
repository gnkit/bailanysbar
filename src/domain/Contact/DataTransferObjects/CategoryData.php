<?php

namespace Domain\Contact\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Illuminate\Validation\Rule;

final class CategoryData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly ?int $parent_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('category')->ignore(request('category'))],
            'parent_id' => ['sometimes', 'nullable', 'int'],
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
    }
}