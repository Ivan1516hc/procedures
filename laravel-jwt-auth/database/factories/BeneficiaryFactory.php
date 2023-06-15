<?php

namespace Database\Factories;

use App\Models\Beneficiary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
{
    protected $model = Beneficiary::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'curp' => $this->faker->word(18),
            'nombre' => $this->faker->firstName(),
            'apaterno' => $this->faker->lastName(),
            'amaterno' => $this->faker->lastName(),
            'escolaridad' => $this->faker->randomElement([1,17,18,3]),
            'fechanacimiento' => $this->faker->dateTimeBetween('-10 years',now()),
            'calle' => $this->faker->streetName(),
            'numext' => $this->faker->numberBetween(100,9999),
            'primercruce' => $this->faker->streetName(),
            'segundocruce' => $this->faker->streetName(),
            'vivienda' => $this->faker->numberBetween(1,5),
            'municipio' => $this->faker->city(),
            'codigopostal' => 44700,
            'colonia' => 57802,
            'lenguamaterna' => 3,
            'serviciosmedicos' => 16,
            'sexo' => $this->faker->numberBetween(1,2),
            'celular' => '3331974977',
            'edad' => $this->faker->numberBetween(1,8),
            'hermanos_en_CDI' => 0,
            'tipo_sangre' => 'O+',
            'enfermedad'=> 78,
            'status' => 0
        ];
    }
}
