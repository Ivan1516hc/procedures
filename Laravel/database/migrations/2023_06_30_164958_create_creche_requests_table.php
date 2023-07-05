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
        Schema::create('creche_requests', function (Blueprint $table) {
            $table->id();

            $table->unsignedSmallInteger('creche_id')->nullable();
            $table->foreign('creche_id')->references('id')->on('creches');

            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('requests');

            $table->unsignedTinyInteger('degree_id');
            $table->foreign('degree_id')->references('id')->on('degrees');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creche_requests');
    }
};
