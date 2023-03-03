<?php

namespace Domain\Account\Models;

use Database\Factories\Account\RoleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Role extends BaseModel
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
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function permissions():BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    protected static function newFactory()
    {
        return app(RoleFactory::class);
    }
}
