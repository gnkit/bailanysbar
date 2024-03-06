<?php

namespace Database\Seeders;

use Domain\Link\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ContactFromJsonFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawData = File::get(base_path('database/data/orgs.json'));
        $data = json_decode($rawData, true);
        foreach ($data['orgs'] as $datum) {
            if (str_contains($datum['address'], 'г.Каратау')) {
                Contact::factory()->create([
                    'title' => $datum['titleKz'],
                    'name' => $datum['director'],
                    'description' => $datum['manage'],
                    'address' => $datum['address'],
                    'phone' => $datum['tel'],
                    'instagram' => null,
                    'telegram' => null,
                    'whatsapp' => null,
                    'site' => ' ' ? null : rtrim($datum['site']),
                    'status' => 'published',
                    'user_id' => 1,
                    'category_id' => 18,
                    'image' => 'default/contact.png',
                ]);
            }
        }
    }
}
