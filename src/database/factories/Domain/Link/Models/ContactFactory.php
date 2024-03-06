<?php

namespace Database\Factories\Domain\Link\Models;

use Domain\Link\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Account\Models\Role>
 */
class ContactFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'instagram' => 'https://instagram/'.fake()->word(),
            'telegram' => 'https://telegram/'.fake()->word(),
            'whatsapp' => 'https://whatsapp/'.fake()->word(),
            'site' => fake()->url(),
            'status' => $this->faker->randomElement(['draft', 'published', 'pending']),
            'user_id' => fake()->numberBetween($min = 1, $max = 10),
            'category_id' => fake()->numberBetween($min = 1, $max = 29),
            'image' => 'default/contact.png',
        ];
    }
}
