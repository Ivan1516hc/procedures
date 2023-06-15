<?php

namespace Database\Factories;

use App\Models\Request;
use App\Models\RequestDocument;
use App\Models\RequiredDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestDocument>
 */
class RequestDocumentFactory extends Factory
{
    protected $model = RequestDocument::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'required_document_id' => RequiredDocument::all()->random()->id,
            'request_id' => Request::all()->random()->id,
            'url' => $this->faker->url,
        ];
    }
}
