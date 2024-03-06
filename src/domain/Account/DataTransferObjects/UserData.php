<?php

namespace Domain\Account\DataTransferObjects;

use Domain\Account\Actions\Role\GetBySlugRoleAction;
use Domain\Account\Enums\User\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;
use Spatie\LaravelData\Data;

final class UserData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password,
        public readonly UserStatus $status,
        public readonly int $role_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'email:rfc,dns', Rule::unique('users', 'email')->ignore(request()->user)],
            'password' => ['sometimes', Password::min(8)->mixedCase()->numbers()->symbols()],
            'status' => ['sometimes', new Enum(UserStatus::class)],
            'role_id' => ['required', 'numeric', 'exists:roles,id'],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            'name' => __('messages.name'),
            'email' => __('messages.email'),
            'password' => __('messages.password'),
            'status' => __('messages.status'),
            'role_id' => __('messages.role'),
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'id' => $request->user ?? null,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $request->user()->password,
            'status' => $request->status ?? UserStatus::ACTIVE,
            'role_id' => $request->role_id ?? GetBySlugRoleAction::execute('customer'),
        ]);
    }
}
