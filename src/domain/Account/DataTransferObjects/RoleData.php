<?php

namespace Domain\Account\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

final class RoleData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly ?string $slug,
        public readonly ?array $permissions,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('roles')->ignore(request('role'))],
            'permissions' => ['nullable', 'sometimes'],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            'name' => __('messages.name'),
            'permissions' => __('messages.permissions'),
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => $request->role ?? null,
            'name' => $request->name,
            'permissions' => $request->permissions,
        ]);
    }
}
