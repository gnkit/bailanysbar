<?php

namespace Domain\Account\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

final class PermissionData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly ?string $slug,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('permissions')->ignore(request('permission'))],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            'name' => __('messages.name'),
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => $request->permission ?? null,
            'name' => $request->name,
        ]);
    }
}
