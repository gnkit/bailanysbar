<?php

namespace Domain\Contact\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Domain\Shared\Models\BaseModel;
use Database\Factories\Contact\CategoryFactory;

final class Category extends BaseModel
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    /**
     * @return HasMany
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }


    /**
     * @return HasMany
     */
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed|void
     */
    protected static function newFactory()
    {
        return app(CategoryFactory::class);
    }
}
