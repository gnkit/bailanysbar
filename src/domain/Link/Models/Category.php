<?php

namespace Domain\Link\Models;

use Database\Factories\Domain\Link\Models\CategoryFactory;
use Domain\Shared\Models\BaseModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $name_en
 * @property string $name_ru
 * @property string $slug
 * @property string $icon
 * @property string|null $color
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Category> $children
 * @property-read int|null $children_count
 * @property-read Collection<int, Contact> $contacts
 * @property-read int|null $contacts_count
 * @property-read Category|null $parent
 *
 * @method static CategoryFactory factory($count = null, $state = [])
 * @method static Builder<static>|Category newModelQuery()
 * @method static Builder<static>|Category newQuery()
 * @method static Builder<static>|Category query()
 * @method static Builder<static>|Category whereColor($value)
 * @method static Builder<static>|Category whereCreatedAt($value)
 * @method static Builder<static>|Category whereIcon($value)
 * @method static Builder<static>|Category whereId($value)
 * @method static Builder<static>|Category whereName($value)
 * @method static Builder<static>|Category whereNameEn($value)
 * @method static Builder<static>|Category whereNameRu($value)
 * @method static Builder<static>|Category whereParentId($value)
 * @method static Builder<static>|Category whereSlug($value)
 * @method static Builder<static>|Category whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
final class Category extends BaseModel
{
    protected $fillable = [
        'name',
        'name_en',
        'name_ru',
        'slug',
        'icon',
        'parent_id',
        'color',
    ];

    /** @return HasMany<Contact, $this> */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    /** @return HasMany<Category, $this> */
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /** @return BelongsTo<Category, $this> */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
