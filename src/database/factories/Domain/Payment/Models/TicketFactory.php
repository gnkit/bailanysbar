<?php

namespace Database\Factories\Domain\Payment\Models;

use Domain\Payment\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Account\Models\Role>
 */
class TicketFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'limit' => fake()->numberBetween(1, 5),
        ];
    }
}
