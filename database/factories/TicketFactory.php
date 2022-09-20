<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => fake()->unique()->regexify('[A-Z]{5}[0-9]{5}'),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'ktp' => fake()->randomNumber(),
        ];
    }
}