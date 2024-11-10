<?php

namespace Database\Seeders;

use App\Models\Edificio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $edificios = [
            ['nombreedificio' => 'Sala de Vinculación', 'nombrecorto' => 'SVINC'],
            ['nombreedificio' => 'Centro de Cómputo', 'nombrecorto' => 'CCOMP'],
            ['nombreedificio' => 'Ciencias Básicas', 'nombrecorto' => 'CBASC'],
            ['nombreedificio' => 'Edificio K', 'nombrecorto' => 'EDK'],
            ['nombreedificio' => 'Lab. Electrónica', 'nombrecorto' => 'LELEC'],
            ['nombreedificio' => 'Sistemas y Comp.', 'nombrecorto' => 'SCOMP'],
            ['nombreedificio' => 'Lab. Cómputo Ind.', 'nombrecorto' => 'LCIND'],
            ['nombreedificio' => 'Edif. Ing. Industrial', 'nombrecorto' => 'EIIND'],
            ['nombreedificio' => 'Centro de Idiomas', 'nombrecorto' => 'CIDI'],
            ['nombreedificio' => 'Edificio H', 'nombrecorto' => 'EDH'],
            ['nombreedificio' => 'Edificio D', 'nombrecorto' => 'EDD'],
        ];

        foreach ($edificios as $edificio) {
            Edificio::create($edificio);
        }
    }
}
