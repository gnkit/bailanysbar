<?php

namespace Domain\Link\Models;

use Domain\Shared\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Category extends BaseModel
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'name_en',
        'name_ru',
        'slug',
        'icon',
        'parent_id',
        'color',
    ];

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
