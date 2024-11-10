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
                    ['Calculo diferencial', 'Fundamentos de Programacion', 'Taller de Administracion'],
                    ['Calculo integral', 'Contabilidad financiera', 'Quimica'],
                    ['Calculo vectorial', 'Sistemas operativos', 'Estructura de datos'],
                    ['Ecuaciones diferenciales', 'Metodos numericos', 'Topicos avanzados de programacion'],
                    ['Desarrollo sustentable', 'Taller de base de datos', 'Simulacion'],
                    ['Lenguajes y autonomas', 'Redes de computadora', 'Administracion de base de datos'],
                    ['Programacion web II', 'Taller de investigacion I', 'Cultura empresarial'],
                    ['Taller de investigacion II', 'administracion de redes', 'Programacion movil'],
                    ['Residencia profesional', 'Programacion movil multiplataforma', 'Inteligencia artificial'],
                ];

                foreach ($materiasIsc as $semestre => $materias) {
                    foreach ($materias as $materia) {
                        Materia::create([
                            'idmateria' => substr('M' . ($semestre + 1) . '-' . strtoupper(str_replace(' ', '_', $materia)), 0, 10),
                            'nombre' => $materia,
                            'nivel' => (string) ($semestre + 1),
                            'nombremediano' => substr($materia, 0, 25),
                            'nombrecorto' => substr($materia, 0, 10),
                            'modalidad' => 'P', // Asignando modalidad Teoría
                            'idReticula' => $reticula->id, // Asociar materia a la retícula correspondiente
                        ]);
                    }
                }
            }

            if ($carrera->idcarrera === 'IT7') { // Industrial
                $materiasIndustrial = [
                    ['Fundamentos de investigacion', 'Taller de etica'],
                    ['Calculo integral', 'Propiedad de los materiales'],
                    ['Metrologia y normalizacion', 'Algebra lineal'],
                    ['Procesos de fabricacion', 'Fisica'],
                    ['Administracion de proyectos', 'Gestion de costos'],
                    ['Ingieneria economica', 'Simulacion'],
                    ['Planeacion financiera', 'Sistemas de manufactura'],
                    ['Relaciones industriales', 'Topicos de calidad'],
                    ['Emprendimiento e innovacion', 'Manufactura integrada por computadora'],
                ];

                foreach ($materiasIndustrial as $semestre => $materias) {
                    foreach ($materias as $materia) {
                        Materia::create([
                            'idmateria' => substr('M' . ($semestre + 1) . '-' . strtoupper(str_replace(' ', '_', $materia)), 0, 10),
                            'nombre' => $materia,
                            'nivel' => (string) ($semestre + 1),
                            'nombremediano' => substr($materia, 0, 25),
                            'nombrecorto' => substr($materia, 0, 10),
                            'modalidad' => 'P', // Asignando modalidad Teoría
                            'idReticula' => $reticula->id, // Asociar materia a la retícula correspondiente
                        ]);
                    }
                }
            }
        }
    }
}
