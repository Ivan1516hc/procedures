<?php

namespace Database\Factories;

use App\Models\Beneficiary;
use App\Models\Creche;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BeneficiaryCreche>
 */
class BeneficiaryCrecheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'creche_id' => Creche::all()->random()->id,
            'beneficiary_id' => Beneficiary::all()->random()->id,
            'status' =>$this->faker->randomElement([0,1])
        ];
    }
}
