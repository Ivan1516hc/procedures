<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Center>
 */
class CenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->streetName(),
            'latitude' => $this->faker->latitude(20.632551942249567,20.74528704095295),
            'longitude' => $this->faker->longitude(-103.45832458337084,-103.3876),
        ];
    }
}
