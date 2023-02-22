<?php

namespace Domain\Account\DataTransferObjects;

use Domain\Account\Models\Permission;
use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Illuminate\Validation\Rule;

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

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => $request->role ?? null,
            'name' => $request->name,
            'permissions' => $request->permissions,
        ]);
    }
}
