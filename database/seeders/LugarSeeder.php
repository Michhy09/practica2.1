<?php

namespace Database\Seeders;

use App\Models\Lugar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lugares = [];

        // Salones del Edificio K
        for ($i = 1; $i <= 13; $i++) {
            $lugares[] = [
                'nombrelugar' => "Salón {$i}K",
                'nombrecorto' => "{$i}K",
                'edificio_id' => 4, // ID del Edificio K
            ];
        }

        // Salones del Edificio D
        for ($i = 1; $i <= 13; $i++) {
            $lugares[] = [
                'nombrelugar' => "Salón {$i}D",
                'nombrecorto' => "{$i}D",
                'edificio_id' => 11, // ID del Edificio D
            ];
        }

        // Salas del Edificio de Sistemas y Computación
        $salas_sistemas = [
            ['nombrelugar' => 'Sala LCD', 'nombrecorto' => 'LCD'],
            ['nombrelugar' => 'Sala LCE', 'nombrecorto' => 'LCE'],
            ['nombrelugar' => 'Sala LCR', 'nombrecorto' => 'LCR'],
            ['nombrelugar' => 'Sala LCF', 'nombrecorto' => 'LCF'],
            ['nombrelugar' => 'Sala Valerdi', 'nombrecorto' => 'VAL'],
        ];

        foreach ($salas_sistemas as $sala) {
            $lugares[] = array_merge($sala, ['edificio_id' => 6]); // ID del Edificio de Sistemas y Computación
        }

        // Insertar todos los lugares en la tabla
        foreach ($lugares as $lugar) {
            Lugar::create($lugar);
        }
    }
}
