<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Beneficiary;
use App\Models\BeneficiaryRequest;
use App\Models\Department;
use App\Models\DocumentType;
use App\Models\Priority;
use App\Models\Procedure;
use App\Models\QuestionProcedure;
use App\Models\Questions;
use App\Models\Quote;
use App\Models\RequestDocument;
use App\Models\Requests;
use App\Models\RequiredDocument;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Priority::factory()->create([
            'name'                  => 'BAJA'
        ]);
        Priority::factory()->create([
            'name'                  => 'MEDIA'
        ]);
        Priority::factory()->create([
            'name'                  => 'ALTA'
        ]);
        // Priority::factory(3)->create();
        Department::factory(5)->create();
        Role::factory(3)->create();
        User::factory(200)->create();
        DocumentType::factory(5)->create();
        // Visitor::factory(200)->create();
        Questions::factory(10)->create();
        Procedure::factory(4)->create();
        QuestionProcedure::factory(4)->create();
        Requests::factory(120)->create();
        RequiredDocument::factory(10)->create();
        Answer::factory(150)->create();
        Beneficiary::factory(200)->create();
        RequestDocument::factory(120)->create();
        BeneficiaryRequest::factory(150)->create();
        Quote::factory(60)->create();
    }
}
