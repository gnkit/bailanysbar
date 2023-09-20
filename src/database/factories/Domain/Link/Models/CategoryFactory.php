<?php

namespace Database\Factories\Domain\Link\Models;

use Domain\Link\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Account\Models\Role>
 */
class CategoryFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'icon' => 'fa-solid fa-paperclip',
            'parent_id'=> fake()->randomElement([null, 1, 2]),
        ];
    }
}
