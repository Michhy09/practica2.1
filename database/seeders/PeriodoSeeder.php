<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    static $indice = -1;

    public function run()
    {
        static::$indice++;

        // Definir los periodos
        $per = [
            ['Ene-Jun 24', 'E-J24', '2024-01-20', '2024-06-23'],
            ['Ago-Dic 24', 'A-D24', '2024-08-21', '2024-12-24'],
            ['Ene-Jun 25', 'E-J25', '2025-01-22', '2025-06-25'],
            ['Ago-Dic 25', 'A-D25', '2025-08-23', '2025-12-26'],
            ['Ene-Jun 26', 'E-J26', '2026-01-24', '2026-06-28'],
            ['Ago-Dic 26', 'A-D26', '2026-08-25', '2026-12-29'],
            ['Ene-Jun 27', 'E-J27', '2027-01-26', '2027-06-30'],
        ];

        // Insertar los periodos en la base de datos
        foreach ($per as $periodo) {
            Periodo::create([
                'idPeriodo' => $periodo[1], // Aquí asignamos el idPeriodo manualmente
                'periodo' => $periodo[0],
                'descorta' => $periodo[1],
                'fechaInicio' => $periodo[2],
                'fechaFin' => $periodo[3],
            ]);
        }
    }
}
