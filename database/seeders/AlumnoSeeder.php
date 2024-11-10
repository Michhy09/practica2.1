<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker; // Si usas Faker para generar datos aleatorios

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 // Usando Faker para generar datos de alumnos aleatorios
 $faker = Faker::create();

 // Obtener las primeras 4 carreras (las que tendrán alumnos asignados)
 $carreras = Carrera::whereIn('idcarrera', ['IT1', 'IT2', 'IT3', 'IT4'])->get();

 foreach ($carreras as $carrera) {
     // Crear 5 alumnos para cada carrera
     for ($i = 0; $i < 5; $i++) {
         Alumno::create([
             'noctrl' => $faker->unique()->numerify('########'), // Generar un número de control único
             'nombre' => $faker->firstName(),
             'apellidop' => $faker->lastName(),
             'apellidom' => $faker->lastName(),
             'sexo' => $faker->randomElement(['M', 'F']), // Sexo aleatorio (M o F)
             'carrera_id' => $carrera->idcarrera, // Asignar el id de la carrera
         ]);
     }
 }

    }
}
