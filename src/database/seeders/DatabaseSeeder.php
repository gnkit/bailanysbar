<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            ManagerSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ContactSeeder::class,
            TicketSeeder::class,
        ]);
    }
}
