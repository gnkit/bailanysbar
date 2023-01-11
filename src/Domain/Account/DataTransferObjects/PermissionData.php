<?php

namespace Domain\Account\DataTransferObjects;

use Spatie\LaravelData\Data;
use Illuminate\Validation\Rule;

class PermissionData extends Data
{
	public function __construct(
		public readonly ?int $id,
		public readonly string $name,
		public readonly string $slug,
	) {}

	public static function rules(): array
	{
		return [
			'name' => ['required', 'string', Rule::unique('permissions')->ignore($this->permission)],
		];
	}

	public static function fromRequest(Request $request): self
	{
		return self::from([
			'name' => $request->name,
		]);
	}
}