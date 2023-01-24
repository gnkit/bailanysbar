<?php

namespace Domain\Account\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\LaravelData\Data;
use Illuminate\Validation\Rule;
use Domain\Account\Enums\User\UserStatus;

final class UserData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly UserStatus $status,
        public readonly ?int $role_id,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'email:rfc,dns', Rule::unique('users')->ignore(request('email'))],
            // 'email' => ['required', 'unique:users', 'email:rfc,dns'],
            'password' => ['sometimes'],
            // 'password' => ['sometimes', Password::min(8)->mixedCase()->numbers()->symbols()],
            'status' => ['sometimes', new Enum(UserStatus::class)],
            'role_id' => ['required'],
        ];
    }

    public static function fromRequest(Request $request): self
    {
        return self::from([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'status' => $request->status ?? UserStatus::ACTIVE,
            'role_id' => $request->role_id,
        ]);
    }
}
