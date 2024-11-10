<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Personal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fechaIngresoSEP = Carbon::parse('2020-01-01');  // Fecha común de ingreso
        $fechaIngresoINS = Carbon::parse('2021-06-15');  // Fecha común de ingreso a la institución

        $personas = [
            // Director
            [
                'nombres' => 'Gustavo Emilio',
                'apellidop' => 'Rojo',
                'apellidom' => 'Velázquez',
                'RFC' => 'GERV920101ABC',
                'doctorado' => 'Doctorado en Administración Educativa',
                'doctit' => 1,
                'depto_id' => 1, // Dirección General
                'puesto_id' => 3, // Director
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            // Subdirectores
            [
                'nombres' => 'Carlos',
                'apellidop' => 'Patiño',
                'apellidom' => 'Chávez',
                'RFC' => 'CPCH850102ABC',
                'maestria' => 'Maestría en Planeación Educativa',
                'maetit' => 1,
                'depto_id' => 2, // Subdirección General
                'puesto_id' => 4, // Subdirector Académico
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'Aída',
                'apellidop' => 'Hernández',
                'apellidom' => 'Ávila',
                'RFC' => 'AHAE870103DEF',
                'maestria' => 'Maestría en Planeación Educativa',
                'maetit' => 1,
                'depto_id' => 2, // Subdirección General
                'puesto_id' => 5, // Subdirector de Plantación
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'José Carlos',
                'apellidop' => 'Hernández',
                'apellidom' => 'Lozano',
                'RFC' => 'JCHL880104GHI',
                'maestria' => 'Maestría en Educación',
                'maetit' => 1,
                'depto_id' => 2, // Subdirección General
                'puesto_id' => 5, // Subdirector de Plantación
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            // Maestros de ISC
            [
                'nombres' => 'Roberto',
                'apellidop' => 'Espinoza',
                'apellidom' => 'Torres',
                'RFC' => 'RET910101JKL',
                'doctorado' => 'Doctorado en Ciencias Computacionales',
                'doctit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'Antonio',
                'apellidop' => 'Chavez',
                'apellidom' => 'Soto',
                'RFC' => 'ACS920202MNO',
                'licenciatura' => 'Ingeniería en Sistemas Computacionales',
                'lictit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            // Agrega los registros restantes de los 10 maestros de ISC
            [
                'nombres' => 'Flor de Maria',
                'apellidop' => 'Rivera',
                'apellidom' => 'Sanchez',
                'RFC' => 'FMRS930303PQR',
                'maestria' => 'Maestría en Ciencias Computacionales',
                'maetit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'Hilda Patricia',
                'apellidop' => 'Beltran',
                'apellidom' => 'Hernandez',
                'RFC' => 'HPBH940404STU',
                'maestria' => 'Maestría en Ciencias Computacionales',
                'maetit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'Maria Guadalupe',
                'apellidop' => 'Najera',
                'apellidom' => 'Lozano',
                'RFC' => 'MGNL950505VWX',
                'maestria' => 'Maestría en Ciencias Computacionales',
                'maetit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'Wilber Eliud ',
                'apellidop' => 'Garcia',
                'apellidom' => 'Villareal',
                'RFC' => 'WLBE50505VWX',
                'licenciatura' => 'Ingeniería en Sistemas Computacionales',
                'lictit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'Hector Carlos ',
                'apellidop' => 'Valadez',
                'apellidom' => 'Moyeda',
                'RFC' => 'HECT50505VWX',
                'licenciatura' => 'Ingeniería en Sistemas Computacionales',
                'lictit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'David Sergio',
                'apellidop' => 'Castellon',
                'apellidom' => 'Dominguez',
                'RFC' => 'CASTR50505VWX',
                'licenciatura' => 'Ingeniería en Sistemas Computacionales',
                'lictit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'Aquiles',
                'apellidop' => 'Gonzales',
                'apellidom' => 'Ramos',
                'RFC' => 'AQUILS50505VWX',
                'licenciatura' => 'Ingeniería en Sistemas Computacionales',
                'lictit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],
            [
                'nombres' => 'Miguel Arturo',
                'apellidop' => 'Velez',
                'apellidom' => 'Riojas',
                'RFC' => 'RIOJA50505VWX',
                'licenciatura' => 'Ingeniería en Sistemas Computacionales',
                'lictit' => 1,
                'depto_id' => 1, // Ingeniería en Sistemas Computacionales
                'puesto_id' => 2, // Profesor
                'fechaingsep' => $fechaIngresoSEP,
                'fechaingins' => $fechaIngresoINS,
            ],

            // Más maestros ISC, completa la lista siguiendo el mismo patrón
        ];

        // Insertar cada persona en la tabla de personal
        foreach ($personas as $persona) {
            Personal::create($persona);
        }
    
    }
}
