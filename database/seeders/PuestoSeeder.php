<?php

namespace Database\Seeders;

use App\Models\Puesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

// Definir los datos para los puestos
$puestos = [
    // Tipo "Docentes"
    ['idpuesto' => 'D1', 'nombre' => 'Profesor', 'tipo' => 'Docente'],

    // Tipo "Dirección"
    ['idpuesto' => 'DIR1', 'nombre' => 'Director', 'tipo' => 'Dirección'],
    ['idpuesto' => 'DIR2', 'nombre' => 'Subdirector Académico', 'tipo' => 'Dirección'],
    ['idpuesto' => 'DIR3', 'nombre' => 'Subdirector de Plantación', 'tipo' => 'Dirección'],

    // Tipo "No Docente"
    ['idpuesto' => 'ND1', 'nombre' => 'Coordinador de Tareas', 'tipo' => 'No Docente'],
    ['idpuesto' => 'ND2', 'nombre' => 'Encargado de Biblioteca', 'tipo' => 'No Docente'],
    ['idpuesto' => 'ND3', 'nombre' => 'Asistente de Eventos', 'tipo' => 'No Docente'],

    // Tipo "Auxiliar"
    ['idpuesto' => 'AUX1', 'nombre' => 'Auxiliar de Laboratorio', 'tipo' => 'Auxiliar'],
    ['idpuesto' => 'AUX2', 'nombre' => 'Auxiliar de Biblioteca', 'tipo' => 'Auxiliar'],
    ['idpuesto' => 'AUX3', 'nombre' => 'Auxiliar de Taller', 'tipo' => 'Auxiliar'],

    // Tipo "Administrativo"
    ['idpuesto' => 'AD1', 'nombre' => 'Jefe de Recursos Humanos', 'tipo' => 'Administrativo'],
    ['idpuesto' => 'AD2', 'nombre' => 'Jefe Académico', 'tipo' => 'Administrativo'],
    ['idpuesto' => 'AD3', 'nombre' => 'Jefe División de Estudiosos', 'tipo' => 'Administrativo'],
];

// Insertar los datos en la base de datos
foreach ($puestos as $puesto) {
    Puesto::create($puesto);
}

}
}
