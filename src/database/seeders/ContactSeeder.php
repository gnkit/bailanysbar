<?php

namespace Database\Seeders;

use Domain\Link\Models\Contact;
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
            ->count(2000)
            ->create();
    }
}
