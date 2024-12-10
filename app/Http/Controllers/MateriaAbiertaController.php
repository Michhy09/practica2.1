<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Http\Request;
use App\Models\MateriaAbierta;

class MateriaAbiertaController extends Controller
{
    public $carrera;
    public $ma;
    public $periodo_id;
    public $carrera_id;

    function __construct()
    {
        if (request()->idperiodo) {
            $this->periodo_id = request()->idperiodo;
            session(['periodo_id' => request()->idperiodo]);
        } else {
            $this->periodo_id = (session()->exists('periodo_id') ? session('periodo_id') : "-1");
        }

        if (request()->idcarrera) {
            $this->carrera_id = request()->idcarrera;
            session(['carrera_id' => request()->idcarrera]);
        } else {
            $this->carrera_id = (session()->exists('carrera_id') ? session('carrera_id') : "-1");
        }

        $this->carrera = Carrera::with("reticulas.materias")->where('id', $this->carrera_id)->get();

        $this->ma = MateriaAbierta::where('periodo_id', $this->periodo_id)
            ->where('carrera_id', $this->carrera_id)
            ->get();
    }    

    public function index(Request $request)
{
    // Obtener la carrera y el periodo seleccionados desde el formulario o sesión
    $carreraId = $request->idcarrera ?? session('carrera_id');
    $periodoId = $request->idperiodo ?? session('periodo_id');

    // Guardar en la sesión para mantener los valores seleccionados
    session(['carrera_id' => $carreraId, 'periodo_id' => $periodoId]);

    // Obtener la carrera seleccionada con las materias por semestre
    $materiasPorSemestre = [];
    for ($semestre = 1; $semestre <= 9; $semestre++) {
        // Obtener materias del semestre actual
        $materiasSemestre = Materia::whereHas('reticula', function ($query) use ($carreraId) {
            $query->where('idCarrera', $carreraId); // Filtrar por carrera
        })
        ->where('semestre', $semestre) // Filtrar por semestre
        ->get();

        // Almacenar las materias en un arreglo indexado por semestre
        $materiasPorSemestre[$semestre] = $materiasSemestre;
    }

    // Obtener las materias abiertas para el periodo y carrera seleccionados
    $materiasAbiertas = MateriaAbierta::where('periodo_id', $periodoId)
        ->where('carrera_id', $carreraId)
        ->pluck('materia_id')
        ->toArray();

    // Enviar los datos a la vista
    return view('matabi.index', [
        'carrera' => Carrera::with(['reticulas'])->find($carreraId),
        'periodos' => Periodo::all(),
        'carreras' => Carrera::all(),
        'materiasPorSemestre' => $materiasPorSemestre, // Materias organizadas por semestre
        'materiasAbiertas' => $materiasAbiertas, // IDs de materias ya abiertas
    ]);
}




    

   
public function store(Request $request)
{
    $periodoId = session('periodo_id');
    $carreraId = session('carrera_id');

    if ($periodoId != "-1" && $carreraId != "-1") {
        // Agregar materias marcadas
        foreach ($request->except(['_token', 'eliminar']) as $key => $materiaId) {
            if (substr($key, 0, 1) === 'm') {
                MateriaAbierta::firstOrCreate([
                    'materia_id' => $materiaId,
                    'periodo_id' => $periodoId,
                    'carrera_id' => $carreraId,
                ]);
            }
        }

        // Eliminar materias desmarcadas
        if ($request->eliminar && $request->eliminar !== "NOELIMINAR") {
            MateriaAbierta::where('materia_id', $request->eliminar)
                ->where('periodo_id', $periodoId)
                ->where('carrera_id', $carreraId)
                ->delete();
        }
    }

    return redirect()->route('matabi.index');
}




    
    

}