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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('RFC', 100); // RFC de tipo VARCHAR con longitud de 100.
            $table->string('nombres', 50); // Nombres de tipo VARCHAR con longitud de 50.
            $table->string('apellidop', 50); // Apellido paterno de tipo VARCHAR con longitud de 50.
            $table->string('apellidom', 50); // Apellido materno de tipo VARCHAR con longitud de 50.
            $table->string('licenciatura', 200)->nullable(); // Licenciatura de tipo VARCHAR con longitud de 200.
            $table->tinyInteger('lictit')->default(0); // Licenciatura tipo TINYINT (0 o 1).
            $table->string('especializacion', 200)->nullable(); // Especialización de tipo VARCHAR con longitud de 200.
            $table->tinyInteger('esptit')->default(0); // Especialización tipo TINYINT (0 o 1).
            $table->string('maestria', 200)->nullable(); // Maestría de tipo VARCHAR con longitud de 200.
            $table->tinyInteger('maetit')->default(0); // Maestría tipo TINYINT (0 o 1).
            $table->string('doctorado', 200)->nullable(); // Doctorado de tipo VARCHAR con longitud de 200.
            $table->tinyInteger('doctit')->default(0); // Doctorado tipo TINYINT (0 o 1).
            $table->date('fechaingsep'); // Fecha de ingreso a SEP de tipo DATE.
            $table->date('fechaingins'); 
            $table->foreignId("depto_id")->constrained();
            $table->foreignId('puesto_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
