<?php

namespace Database\Seeders;

use App\Models\Reticula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carrera;  // Importar el modelo Carrera

class ReticulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todas las carreras para asignar una retícula a cada una
        $carreras = Carrera::all();

        foreach ($carreras as $carrera) {
            Reticula::create([
                'idreticula' => 'RT-' . $carrera->idcarrera,
                'desc' => 'Retícula para ' . $carrera->nombrecarrera,
                'fechaVigor' => now()->subYears(rand(1, 5)), // Fecha aleatoria en los últimos 5 años
                'idCarrera' => $carrera->id,
            ]);
        }
    }

}
