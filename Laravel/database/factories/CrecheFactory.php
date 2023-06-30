<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\Degree;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Creche>
 */
class CrecheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'capacity' => $this->faker->numberBetween(1,30),
            'degree_id' => Degree::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'center_id' => Center::all()->random()->id
        ];
    }
}
