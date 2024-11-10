<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Depto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegúrate de tener al menos 1 departamento en la base de datos
        $departamentos = Depto::all();
        
        // Carrera predefined data
        $carreras = [
            ['idcarrera' => 'IT1', 'nombrecarrera' => 'Ingeniería en Sistemas Computacionales', 'nombremediano' => 'Ing. Sistemas', 'nombrecorto' => 'ISC'],
            ['idcarrera' => 'IT2', 'nombrecarrera' => 'Ingeniería Electrónica', 'nombremediano' => 'Ing. Electrónica', 'nombrecorto' => 'IE'],
            ['idcarrera' => 'IT3', 'nombrecarrera' => 'Ingeniería Mecánica', 'nombremediano' => 'Ing. Mecánica', 'nombrecorto' => 'IM'],
            ['idcarrera' => 'IT4', 'nombrecarrera' => 'Ingeniería Mecatrónica', 'nombremediano' => 'Ing. Mecatrónica', 'nombrecorto' => 'IME'],
            ['idcarrera' => 'IT5', 'nombrecarrera' => 'Contaduría Pública', 'nombremediano' => 'Contaduría', 'nombrecorto' => 'CP'],
            ['idcarrera' => 'IT6', 'nombrecarrera' => 'Ingeniería en Gestión Empresarial', 'nombremediano' => 'Ing. Gestión Emp.', 'nombrecorto' => 'IGE'],
            ['idcarrera' => 'IT7', 'nombrecarrera' => 'Ingeniería Industrial', 'nombremediano' => 'Ing. Industrial', 'nombrecorto' => 'II'],
        ];

        foreach ($carreras as $index => $carreraData) {
            Carrera::create(array_merge($carreraData, [
                'depto_id' => $departamentos->random()->id, // Asigna un depto_id aleatorio
            ]));
        }
    }
}
