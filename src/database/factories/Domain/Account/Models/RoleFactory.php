<?php

namespace Database\Factories\Domain\Account\Models;

use Domain\Account\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Account\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Customer',
            'slug' => 'customer',
        ];
    }
}
