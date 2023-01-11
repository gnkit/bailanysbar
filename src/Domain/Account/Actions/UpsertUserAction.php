<?php

namespace Domain\Account\Actions;
use Domain\Account\DataTransferObjects\UserData;

class UpsertUserAction
{
	public static function execute( UserData $data, User $user) : User
	{
		$user = User::updateOrCreate(
			[
				'id' => $data->id,
			],
			[
				... $data->all(),
			],
		);
		
	return $user;
}