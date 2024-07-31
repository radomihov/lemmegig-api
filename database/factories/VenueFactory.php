<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gig>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
            'address' => $this->faker->sentence(4),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
