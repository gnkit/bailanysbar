<?php

namespace Database\Seeders;

use Domain\Account\Models\Permission;
use Domain\Account\Models\Role;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()
            ->count(1)
            ->state(new Sequence(
                ['name' => 'Manager', 'slug' => 'manager'],
            ))->hasAttached(Permission::all())
            ->create();

        Role::factory()
            ->count(1)
            ->state(new Sequence(
                ['name' => 'Customer', 'slug' => 'customer'],
            ))->hasAttached(Permission::where('slug', 'manage-contacts')->first())
            ->create();
    }
}
