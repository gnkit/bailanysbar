<?php

namespace Domain\Account\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\Account\UserFactory;
use Domain\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Domain\Account\Enums\User\UserStatus;

final class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role_id',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => UserStatus::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return HasMany
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        return $this->role->slug === $role ?? false;
    }

    /**
     * @return bool
     */
    public function isManager(): bool
    {
        return Auth::user()->role->slug === 'manager' ?? false;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected static function newFactory()
    {
        return app(UserFactory::class);
    }
}
