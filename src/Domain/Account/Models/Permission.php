<?php

namespace Domain\Account\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Shared\Models\BaseModel;
use Domain\Account\Models\User;
use Domain\Account\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Permission extends BaseModel
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

}
