<?php

namespace Domain\Payment\Models;

use Database\Factories\Domain\Payment\Models\TicketFactory;
use Domain\Account\Models\User;
use Domain\Shared\Models\BaseModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property int $limit
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 *
 * @method static TicketFactory factory($count = null, $state = [])
 * @method static Builder<static>|Ticket newModelQuery()
 * @method static Builder<static>|Ticket newQuery()
 * @method static Builder<static>|Ticket query()
 * @method static Builder<static>|Ticket whereCreatedAt($value)
 * @method static Builder<static>|Ticket whereId($value)
 * @method static Builder<static>|Ticket whereLimit($value)
 * @method static Builder<static>|Ticket whereUpdatedAt($value)
 * @method static Builder<static>|Ticket whereUserId($value)
 *
 * @mixin Eloquent
 */
class Ticket extends BaseModel
{
    protected $fillable = [
        'user_id',
        'limit',
    ];

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
