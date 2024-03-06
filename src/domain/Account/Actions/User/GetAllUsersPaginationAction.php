<?php

namespace Domain\Account\Actions\User;

use Domain\Account\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

final class GetAllUsersPaginationAction
{
    public static function execute($quantity): Paginator
    {
        $users = User::with('role', 'ticket')->select('id', 'name', 'status', 'role_id')
            ->orderByDesc('created_at')
            ->simplePaginate($quantity);

        return $users;
    }
}
