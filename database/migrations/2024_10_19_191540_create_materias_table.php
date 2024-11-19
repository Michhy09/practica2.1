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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('idmateria', 10);
            $table->string('nombre', 100);
            $table->char('nivel', 1);
            $table->string('nombremediano', 25);
            $table->string('nombrecorto', 10);
            $table->char('modalidad', 1);
            $table->integer('semestre');
            $table->foreignId('idReticula')->constrained('reticulas');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
