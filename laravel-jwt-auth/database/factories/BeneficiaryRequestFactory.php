<?php

namespace Database\Factories;

use App\Models\Beneficiary;
use App\Models\BeneficiaryRequest;
use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BeneficiaryRequest>
 */
class BeneficiaryRequestFactory extends Factory
{
    protected $model = BeneficiaryRequest::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beneficiary_id' => Beneficiary::all()->random()->id,
            'request_id' => Request::all()->random()->id
        ];
    }
}
