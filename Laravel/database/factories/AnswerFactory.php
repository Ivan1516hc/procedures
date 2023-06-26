<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Questions;
use App\Models\Requests;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    protected $model = Answer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id' => Questions::all()->random()->id,
            'request_id' => Requests::all()->random()->id,
            'descripcion' =>$this->faker->sentence,
        ];
    }
}
