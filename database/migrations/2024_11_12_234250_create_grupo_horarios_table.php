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
        Schema::create('grupo_horarios', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('dia'); // Representa un día de la semana o algún tipo de día específico
            $table->time('hora'); // Almacena una hora específica
            $table->foreignId('grupo_id')->constrained(); // Clave foránea a la tabla grupos
            $table->foreignId('lugar_id')->constrained(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_horarios');
    }
};
