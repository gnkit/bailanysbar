<?php

namespace Domain\Account\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\Domain\Account\Models\UserFactory;
use Domain\Account\Actions\User\GetByRoleIdUserCollectionAction;
use Domain\Account\Enums\User\UserStatus;
use Domain\Link\Models\Contact;
use Domain\Payment\Actions\Ticket\CalculateTicketAction;
use Domain\Payment\Models\Ticket;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property UserStatus $status
 * @property int $role_id
 * @property-read Collection<int, Contact> $contacts
 * @property-read int|null $contacts_count
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Role|null $role
 * @property-read Ticket|null $ticket
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 *
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User query()
 * @method static Builder<static>|User whereCreatedAt($value)
 * @method static Builder<static>|User whereEmail($value)
 * @method static Builder<static>|User whereEmailVerifiedAt($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereName($value)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereRoleId($value)
 * @method static Builder<static>|User whereStatus($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
final class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => UserStatus::class,
    ];

    /** @return BelongsTo<Role, $this> */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /** @return HasMany<Contact, $this> */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    /** @return HasOne<Ticket, $this> */
    public function ticket(): HasOne
    {
        return $this->hasOne(Ticket::class);
    }

    public function hasRole(string $role): bool
    {
        return $this->role?->slug === $role;
    }

    public function isManager(): bool
    {
        /** @var User|null $user */
        $user = auth()->user();

        return $user?->role?->slug === 'manager';
    }

    /** @return Collection<int, User> */
    public function managers(): Collection
    {
        return GetByRoleIdUserCollectionAction::execute();
    }

    public function isCanPublishContact(): bool
    {
        /** @var User|null $user */
        $user = auth()->user();

        if ($user === null) {
            return false;
        }

        return CalculateTicketAction::execute($user);
    }

    public function isBanned(): bool
    {
        /** @var User|null $user */
        $user = auth()->user();

        return $user?->status === UserStatus::BAN;
    }
}
