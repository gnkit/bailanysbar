<?php

namespace Database\Factories\Account;

use Domain\Account\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Account\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Manage Contact',
            'slug' => 'manage-contact',
        ];
    }
}
