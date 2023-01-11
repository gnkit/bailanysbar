<?php

namespace Domain\Account\DataTransferObjects;

use Spatie\LaravelData\Data;
use Domain\Account\Role;
use Illuminate\Validation\Rule;

class AccountData extends Data
{
	public function __construct(
		public readonly ?int $id,
		public readonly string $name,
		public readonly string $email,
		public readonly string $password,
		public readonly ?int $role_id,
	) {}

	public static function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'email:rfc,dns', Rule::unique('users')->ignore($this->user)],
            // 'email' => ['required', 'unique:users', 'email:rfc,dns'],
            'password' => ['sometimes'],
			// 'password' => ['sometimes', Password::min(8)->mixedCase()->numbers()->symbols()],
            'role_id' => ['required'],
		];
	}

	public static function fromRequest(Request $request): self
	{
		return self::from([
			... $request->all(),

			'id' => $request->id,
			'role_id' => $request->role_id,
		]);
	}
}