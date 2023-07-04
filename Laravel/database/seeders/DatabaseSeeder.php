<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Beneficiary;
use App\Models\BeneficiaryCreche;
use App\Models\BeneficiaryRequest;
use App\Models\Center;
use App\Models\CenterProcedure;
use App\Models\Creche;
use App\Models\CrecheRequest;
use App\Models\Degree;
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
use App\Models\Room;
use App\Models\StatusRequest;
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
        StatusRequest::create([
            'name'  => 'SIN TERMINAR'
        ]);
        StatusRequest::create([
            'name'  => 'EN PROCESO'
        ]);
        StatusRequest::create([
            'name'  => 'ACEPTADO'
        ]);
        StatusRequest::create([
            'name'  => 'RECHAZADO'
        ]);
        // Priority::factory(3)->create();
        Center::factory(10)->create();
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
        // Degree::factory(5)->create();
        Degree::factory()->create([
            'name'  => 'LACTANTE'
        ]);
        Degree::factory()->create([
            'name'  => 'MATERNAL'
        ]);
        Degree::factory()->create([
            'name'  => 'PRESCOLAR'
        ]);
        // Room::factory(5)->create();
        Room::factory()->create([
            'name'  => 'LAC'
        ]);
        Room::factory()->create([
            'name'  => 'MAT A'
        ]);
        Room::factory()->create([
            'name'  => 'MAT AB'
        ]);
        Room::factory()->create([
            'name'  => 'MAT BC'
        ]);
        Room::factory()->create([
            'name'  => 'MAT C'
        ]);
        Room::factory()->create([
            'name'  => 'PRES 1'
        ]);
        Room::factory()->create([
            'name'  => 'PRES 1 A'
        ]);
        Room::factory()->create([
            'name'  => 'PRES 2'
        ]);
        Room::factory()->create([
            'name'  => 'PRES 3'
        ]);
        CenterProcedure::factory(10)->create();
        Creche::factory(15)->create();
        CrecheRequest::factory(50)->create();
        BeneficiaryCreche::factory(30)->create();
    }
}
