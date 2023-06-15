<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('question_procedures', function (Blueprint $table) {
            $table->smallIncrements('id');

            $table->unsignedSmallInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');

            $table->unsignedTinyInteger('procedure_id');
            $table->foreign('procedure_id')->references('id')->on('procedures');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_procedures');
    }
};
