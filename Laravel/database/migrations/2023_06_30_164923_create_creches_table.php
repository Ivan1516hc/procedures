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
        Schema::create('creches', function (Blueprint $table) {
            $table->smallIncrements('id');

            $table->smallInteger('capacity');

            $table->unsignedTinyInteger('degree_id');
            $table->foreign('degree_id')->references('id')->on('degrees');

            $table->unsignedSmallInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');

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
        Schema::dropIfExists('creches');
    }
};
