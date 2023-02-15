<?php

namespace Database\Seeders;

use Domain\Contact\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'UnCategories';
        Category::create([
            'name' => $name,
            'slug' => Str::slug($name),
            'parent_id' => null,
        ]);

        Category::factory()
            ->count(10)
            ->create();
    }
}
