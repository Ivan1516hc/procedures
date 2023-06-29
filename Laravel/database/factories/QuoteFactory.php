<?php

namespace Database\Factories;

use App\Models\Quote;
use App\Models\Requests;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    protected $model = Quote::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $horarios = ['08:00', '10:00', '14:00', '16:00'];
        return [
            'request_id' => Requests::all()->random()->id,
            'attended' => $this->faker->randomElement([0,1,2]),
            'date' => $this->faker->dateTimeBetween('+1 day', '+2 day'),
            'hour' => $this->faker->randomElement($horarios),
        ];
    }
}
