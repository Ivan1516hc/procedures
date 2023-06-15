<?php

namespace Database\Factories;

use App\Models\Quote;
use App\Models\Request;
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
        return [
            'request_id' => Request::all()->random()->id,
            'attended' => $this->faker->randomElement([0,1,2]),
            'begin' => $this->faker->dateTimeBetween('+1 day', '+2 day'),
            'finish' => $this->faker->dateTimeBetween('+2 day', '+3 day'),
        ];
    }
}
