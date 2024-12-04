<?php

namespace Domain\Account\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Domain\Account\Actions\User\GetByRoleIdUserCollectionAction;
use Domain\Account\Enums\User\UserStatus;
use Domain\Link\Models\Contact;
use Domain\Payment\Actions\Ticket\CalculateTicketAction;
use Domain\Payment\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function ticket(): HasOne
    {
        return $this->hasOne(Ticket::class);
    }

    public function hasRole($role): bool
    {
        return $this->role->slug === $role ?? false;
    }

    public function isManager(): bool
    {
        return \auth()->user()->role->slug === 'manager' ?? false;
    }

    public function managers(): Collection
    {
        return GetByRoleIdUserCollectionAction::execute();
    }

    public function isCanPublishContact(): bool
    {
        return CalculateTicketAction::execute(auth()->user());
    }

    public function isBanned(): bool
    {
        return auth()->user()->status->value === 'ban' ?? false;
    }
}
