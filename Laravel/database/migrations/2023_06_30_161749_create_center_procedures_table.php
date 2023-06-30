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
        Schema::create('center_procedures', function (Blueprint $table) {
            $table->smallIncrements('id');

            $table->unsignedTinyInteger('procedure_id');
            $table->foreign('procedure_id')->references('id')->on('procedures');

            $table->unsignedTinyInteger('center_id');
            $table->foreign('center_id')->references('id')->on('centers');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_procedures');
    }
};
