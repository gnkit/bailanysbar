<?php

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Shared\Models\BaseModel;
use Domain\Account\Models\User;
use Domain\Account\Models\Role;

final class Permission extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

}
