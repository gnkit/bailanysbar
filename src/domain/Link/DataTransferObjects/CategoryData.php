<?php

namespace Domain\Link\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

final class CategoryData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $name_en,
        public readonly string $name_ru,
        public readonly ?string $slug,
        public readonly ?string $icon,
        public readonly ?int $parent_id,
        public readonly ?string $color,
    ) {}

    /** @return array<string, array<int, mixed>> */
    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('categories')->ignore(request('category'))],
            'name_en' => ['required', 'string', Rule::unique('categories')->ignore(request('category'))],
            'name_ru' => ['required', 'string', Rule::unique('categories')->ignore(request('category'))],
            'icon' => ['nullable', 'sometimes', 'string'],
            'parent_id' => ['nullable', 'sometimes', 'int', 'different:id'],
            'color' => ['nullable', 'sometimes', 'string'],
        ];
    }

    /**
     * @param  mixed  ...$args
     * @return array<string, string>
     */
    public static function attributes(...$args): array
    {
        return [
            'name' => __('messages.name'),
            'name_en' => __('messages.name_en'),
            'name_ru' => __('messages.name_ru'),
            'icon' => __('messages.icon'),
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => $request->category ?? null,
            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_ru' => $request->name_ru,
            'icon' => $request->icon,
            'parent_id' => $request->parent_id,
            'color' => $request->color,
        ]);
    }
}
