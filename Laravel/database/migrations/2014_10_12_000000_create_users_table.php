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
        Schema::create('users', function (Blueprint $table) {

            $table->smallIncrements('id'); //AI Unsigned Tinyint
            $table->string('name',25);
            $table->string('last_name',18);
            $table->string('mother_last_name',18);

            $table->unsignedTinyInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->unsignedTinyInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
