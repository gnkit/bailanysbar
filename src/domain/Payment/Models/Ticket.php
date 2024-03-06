<?php

namespace Domain\Payment\Models;

use Domain\Account\Models\User;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends BaseModel
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'limit',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
