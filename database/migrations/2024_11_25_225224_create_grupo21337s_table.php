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
        Schema::create('grupo21337s', function (Blueprint $table) {
            $table->id();
            $table->string('grupo', 5)->unique();    // grupo (varchar5)
            $table->date('fecha');
            $table->string('descripcion', 200); // descripcion (varchar200)
            $table->integer('max_alumnos'); // max_alumnos (int)
            $table->foreignId('periodo_id')->constrained(); // periodo_id (foreign key)
            $table->foreignId('personal_id')->nullable()->constrained(); // personal_id (foreign key, acepta nulos)
            $table->foreignId('materia_abierta_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo21337s');
    }
};
