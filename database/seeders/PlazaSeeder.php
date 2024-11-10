<?php

namespace Database\Seeders;

use App\Models\Plaza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Definir las plazas
         $plazas = [
            ['idplaza' => 'E3817', 'nombrePlaza' => 'Plaza E3817'],
            ['idplaza' => 'E3815', 'nombrePlaza' => 'Plaza E3815'],
            ['idplaza' => 'E3717', 'nombrePlaza' => 'Plaza E3717'],
            ['idplaza' => 'E3617', 'nombrePlaza' => 'Plaza E3617'],
            ['idplaza' => 'E3520', 'nombrePlaza' => 'Plaza E3520'],
        ];

        // Insertar los datos en la base de datos
        foreach ($plazas as $plaza) {
            Plaza::create($plaza);
        }

    }
}
