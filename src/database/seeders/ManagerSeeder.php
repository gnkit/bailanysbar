<?php

namespace Database\Seeders;

use Domain\Account\Models\Role;
use Domain\Account\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('slug', 'manager')->first();

        User::create([
            'name' => 'Manager',
            'email' => 'manager@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('manager'),
            'remember_token' => Str::random(10),
            'status' => 'active',
            'role_id' => $role->id,
        ]);
    }
}
