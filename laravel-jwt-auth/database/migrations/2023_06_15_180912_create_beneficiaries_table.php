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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('curp',18);
            $table->string('nombre');
            $table->string('apaterno');
            $table->string('amaterno');
            $table->integer('escolaridad')->default(1);
            $table->date('fechanacimiento');
            $table->text('calle');
            $table->integer('numext')->nullable();
            $table->string('numint',3)->nullable();
            $table->text('primercruce');
            $table->text('segundocruce');
            $table->integer('vivienda');
            $table->string('municipio'); 
            $table->integer('codigopostal');
            $table->text('colonia');
            $table->integer('lenguamaterna');
            $table->integer('serviciosmedicos');
            $table->integer('sexo');
            $table->string('celular');
            $table->integer('edad');
            $table->boolean('hermanos_en_CDI')->default(0);
            $table->string('edades_hermanos')->nullable();
            $table->text('nombres_hermanos')->nullable();
            $table->string('tipo_sangre');
            $table->text('enfermedad')->nullable();
            $table->text('enfermedad_otro')->nullable();
            $table->integer('idcapturista')->nullable();
            $table->integer('status')->default(0);
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
