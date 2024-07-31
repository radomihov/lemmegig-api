<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class MeetupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gig_id' => $this->faker->numberBetween(1, 5),
            'venue_id' => $this->faker->numberBetween(1, 5),
            'start' => $this->faker->dateTimeBetween('-4 days', 'now'),
            'end' => $this->faker->dateTimeBetween('+1 day', '+1 week'),
            'type' => $this->faker->numberBetween(1, 2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
