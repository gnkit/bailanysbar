<?php

namespace Domain\Link\Models;

use Database\Factories\Domain\Link\Models\ContactFactory;
use Domain\Account\Models\User;
use Domain\Link\Enums\Contact\ContactStatus;
use Domain\Shared\Models\BaseModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string|null $name
 * @property string|null $description
 * @property string|null $address
 * @property string $phone
 * @property string|null $instagram
 * @property string|null $telegram
 * @property string|null $whatsapp
 * @property string|null $site
 * @property ContactStatus $status
 * @property int|null $category_id
 * @property int $user_id
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Category|null $category
 * @property-read User $user
 *
 * @method static ContactFactory factory($count = null, $state = [])
 * @method static Builder<static>|Contact newModelQuery()
 * @method static Builder<static>|Contact newQuery()
 * @method static Builder<static>|Contact query()
 * @method static Builder<static>|Contact whereAddress($value)
 * @method static Builder<static>|Contact whereCategoryId($value)
 * @method static Builder<static>|Contact whereCreatedAt($value)
 * @method static Builder<static>|Contact whereDescription($value)
 * @method static Builder<static>|Contact whereId($value)
 * @method static Builder<static>|Contact whereImage($value)
 * @method static Builder<static>|Contact whereInstagram($value)
 * @method static Builder<static>|Contact whereName($value)
 * @method static Builder<static>|Contact wherePhone($value)
 * @method static Builder<static>|Contact whereSite($value)
 * @method static Builder<static>|Contact whereStatus($value)
 * @method static Builder<static>|Contact whereTelegram($value)
 * @method static Builder<static>|Contact whereTitle($value)
 * @method static Builder<static>|Contact whereUpdatedAt($value)
 * @method static Builder<static>|Contact whereUserId($value)
 * @method static Builder<static>|Contact whereWhatsapp($value)
 *
 * @mixin Eloquent
 */
final class Contact extends BaseModel
{
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

    /** @return BelongsTo<Category, $this> */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /** @return BelongsTo<User, $this> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function selectStatus(string $status): string
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

        return __('messages.cancelled');
    }
}
