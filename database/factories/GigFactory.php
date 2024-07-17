<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class GigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'start_date' => $this->faker->dateTimeBetween('-4 days', 'now'),
            'end_date' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
        ];
    }
}
