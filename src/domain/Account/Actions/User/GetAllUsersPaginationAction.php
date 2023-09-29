<?php

namespace Domain\Account\Actions\User;

use Domain\Account\Models\User;
use Illuminate\Pagination\Paginator;

final class GetAllUsersPaginationAction
{
    /**
     * @param $quantity
     * @return Paginator
     */
    public static function execute($quantity): Paginator
    {
        $users = User::select('id', 'name', 'status', 'role_id')
            ->orderByDesc('created_at')
            ->simplePaginate($quantity);

        return $users;
    }
}
