<?php

namespace Database\Seeders;

use Domain\Contact\Models\Contact;
use Domain\Account\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::factory()
            ->count(30)
            ->create();
    }
}
