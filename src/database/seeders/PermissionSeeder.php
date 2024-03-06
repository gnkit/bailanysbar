<?php

namespace Database\Seeders;

use Domain\Account\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Manage Users', 'slug' => 'manage-users'],
            ['name' => 'Manage Contacts', 'slug' => 'manage-contacts'],
            ['name' => 'Manage Roles', 'slug' => 'manage-roles'],
            ['name' => 'Manage Permissions', 'slug' => 'manage-permissions'],
        ];

        Permission::insert($data);
    }
}
