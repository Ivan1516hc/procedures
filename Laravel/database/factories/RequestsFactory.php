<?php

namespace Database\Factories;

use App\Models\Procedure;
use App\Models\Requests;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestsFactory extends Factory
{
    protected $model = Requests::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'visitor_id' => Visitor::all()->random()->id,
            'procedure_id' => Procedure::all()->random()->id,
            'status' => $this->faker->randomElement([0,1,2]),
        ];
    }
}
