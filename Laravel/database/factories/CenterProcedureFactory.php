<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\Procedure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CenterProcedure>
 */
class CenterProcedureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'procedure_id' => Procedure::all()->random()->id,
            'center_id' => Center::all()->random()->id
        ];
    }
}
