<?php

namespace Domain\Link\Models;

use Domain\Account\Models\User;
use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Shared\Models\BaseModel;
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|void|null
     */
    public function selectStatus($status)
    {
        if (ContactStatus::DRAFT->value === $status) {
            return __('messages.draft');
        }

        if (ContactStatus::PENDING->value === $status) {
            return __('messages.pending');
        }

        if (ContactStatus::PUBLISHED->value === $status) {
            return __('messages.published');
        }

        if (ContactStatus::CANCELLED->value === $status) {
            return __('messages.cancelled');
        }
    }
}
