<?php

namespace Domain\Account\Actions\User;

use Domain\Account\Models\User;
use Illuminate\Contracts\Pagination\Paginator;

final class GetAllUsersPaginationAction
{
    /**
     * @return Paginator<int, User>
     */
    public static function execute(int $quantity): Paginator
    {
        /** @var Paginator<int, User> $users */
        $users = User::with('role', 'ticket')->select('id', 'name', 'status', 'role_id')
            ->orderByDesc('created_at')
            ->simplePaginate($quantity);

        return $users;
    }
}
