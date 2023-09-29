<?php

namespace Domain\Account\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Domain\Account\Actions\User\GetByRoleIdUserCollectionAction;
use Domain\Account\Enums\User\UserStatus;
use Domain\Link\Models\Contact;
use Domain\Payment\Actions\Ticket\GetByUserIdTicketAction;
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
     * @return HasOne
     */
    public function ticket(): HasOne
    {
        return $this->hasOne(Ticket::class);
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
        return \auth()->user()->role->slug === 'manager' ?? false;
    }

    /**
     * @return Collection
     */
    public function managers(): Collection
    {
        return GetByRoleIdUserCollectionAction::execute();
    }

    /**
     * @return bool
     */
    public function isCanPublishContact(): bool
    {
        $ticket = GetByUserIdTicketAction::execute(\auth()->user()->id);

        if ($ticket->limit > 0) {

            return true;
        } else {

            return false;
        }
    }
}
