<?php

namespace Domain\Link\Models;

use Domain\Account\Models\User;
use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Contact extends BaseModel
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'name',
        'description',
        'address',
        'phone',
        'instagram',
        'telegram',
        'whatsapp',
        'site',
        'status',
        'user_id',
        'category_id',
        'image',
    ];

    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:i:s',
        'status' => ContactStatus::class,
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
