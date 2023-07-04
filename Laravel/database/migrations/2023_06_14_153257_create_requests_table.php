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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedTinyInteger('procedure_id');
            $table->foreign('procedure_id')->references('id')->on('procedures');

            $table->unsignedTinyInteger('priority_id');
            $table->foreign('priority_id')->references('id')->on('priorities');

            $table->unsignedTinyInteger('center_id');
            $table->foreign('center_id')->references('id')->on('centers');

            $table->unsignedTinyInteger('status_request_id')->default(1);
            $table->foreign('status_request_id')->references('id')->on('status_requests');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
