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
            'image' => 'https://assets.petco.com/petco/image/upload/f_auto,q_auto/rabbit-care-sheet',
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(20),
            'fee' =>  $this->faker->randomElement(['10.00 лв', '15.00 лв', 'на шапка', 'безплатно']),
            'is_public' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
