<?php

// database/seeders/MateriaSeeder.php

namespace Database\Seeders;

use App\Models\Reticula;
use App\Models\Materia;
use App\Models\Carrera;
use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todas las carreras
        $carreras = Carrera::all();

        foreach ($carreras as $carrera) {
            // Obtener la retícula correspondiente a la carrera
            $reticula = Reticula::where('idCarrera', $carrera->id)->first();

            if (!$reticula) {
                $this->command->info("No se encontró la retícula para la carrera: {$carrera->nombrecarrera}");
                continue;
            }

            // Verificar si la carrera es ISC o Industrial para asignar las materias correspondientes
            if ($carrera->idcarrera === 'IT1') { // ISC
                $materiasIsc = [
                    // Semestre 1
                    [
                        ['Calculo diferencial', 'Fundamentos de Programacion', 'Taller de Administracion'],
                    ],
                    // Semestre 2
                    [
                        ['Calculo integral', 'Contabilidad financiera', 'Quimica'],
                    ],
                    // Semestre 3
                    [
                        ['Calculo vectorial', 'Sistemas operativos', 'Estructura de datos'],
                    ],
                    // Semestre 4
                    [
                        ['Ecuaciones diferenciales', 'Metodos numericos', 'Topicos avanzados de programacion'],
                    ],
                    // Semestre 5
                    [
                        ['Desarrollo sustentable', 'Taller de base de datos', 'Simulacion'],
                    ],
                    // Semestre 6
                    [
                        ['Lenguajes y autonomas', 'Redes de computadora', 'Administracion de base de datos'],
                    ],
                    // Semestre 7
                    [
                        ['Programacion web II', 'Taller de investigacion I', 'Cultura empresarial'],
                    ],
                    // Semestre 8
                    [
                        ['Taller de investigacion II', 'administracion de redes', 'Programacion movil'],
                    ],
                    // Semestre 9
                    [
                        ['Residencia profesional', 'Programacion movil multiplataforma', 'Inteligencia artificial'],
                    ]
                ];

                foreach ($materiasIsc as $semestreIndex => $materias) {
                    foreach ($materias as $materia) {
                        foreach ($materia as $nombreMateria) {
                            Materia::create([
                                'idmateria' => substr('M' . ($semestreIndex + 1) . '-' . strtoupper(str_replace(' ', '_', $nombreMateria)), 0, 10),
                                'nombre' => $nombreMateria,
                                'nivel' => (string) ($semestreIndex + 1),
                                'nombremediano' => substr($nombreMateria, 0, 25),
                                'nombrecorto' => substr($nombreMateria, 0, 10),
                                'modalidad' => 'P', // Asignando modalidad Teoría
                                'semestre' => (string) ($semestreIndex + 1), // Asignando semestre
                                'idReticula' => $reticula->id, // Asociar materia a la retícula correspondiente
                            ]);
                        }
                    }
                }
            }

            if ($carrera->idcarrera === 'IT7') { // Industrial
                $materiasIndustrial = [
                    // Semestre 1
                    [
                        ['Fundamentos de investigacion', 'Taller de etica'],
                    ],
                    // Semestre 2
                    [
                        ['Calculo integral', 'Propiedad de los materiales'],
                    ],
                    // Semestre 3
                    [
                        ['Metrologia y normalizacion', 'Algebra lineal'],
                    ],
                    // Semestre 4
                    [
                        ['Procesos de fabricacion', 'Fisica'],
                    ],
                    // Semestre 5
                    [
                        ['Administracion de proyectos', 'Gestion de costos'],
                    ],
                    // Semestre 6
                    [
                        ['Ingieneria economica', 'Simulacion'],
                    ],
                    // Semestre 7
                    [
                        ['Planeacion financiera', 'Sistemas de manufactura'],
                    ],
                    // Semestre 8
                    [
                        ['Relaciones industriales', 'Topicos de calidad'],
                    ],
                    // Semestre 9
                    [
                        ['Emprendimiento e innovacion', 'Manufactura integrada por computadora'],
                    ]
                ];

                foreach ($materiasIndustrial as $semestreIndex => $materias) {
                    foreach ($materias as $materia) {
                        foreach ($materia as $nombreMateria) {
                            Materia::create([
                                'idmateria' => substr('M' . ($semestreIndex + 1) . '-' . strtoupper(str_replace(' ', '_', $nombreMateria)), 0, 10),
                                'nombre' => $nombreMateria,
                                'nivel' => (string) ($semestreIndex + 1),
                                'nombremediano' => substr($nombreMateria, 0, 25),
                                'nombrecorto' => substr($nombreMateria, 0, 10),
                                'modalidad' => 'P', // Asignando modalidad Teoría
                                'semestre' => (string) ($semestreIndex + 1), // Asignando semestre
                                'idReticula' => $reticula->id, // Asociar materia a la retícula correspondiente
                            ]);
                        }
                    }
                }
            }
        }
    }
}
