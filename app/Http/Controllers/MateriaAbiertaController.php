<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
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

    public function index()
{
    // Obtener los valores de las sesiones
    $periodo_id = session('periodo_id', null);  // Obtiene el valor de periodo_id de la sesión, o null si no existe
    $carrera_id = session('carrera_id', null);  // Obtiene el valor de carrera_id de la sesión, o null si no existe

    // Obtener los periodos y las carreras
    $periodos = Periodo::get();
    $carreras = Carrera::get();

    // Pasamos las variables a la vista
    return view("asmateria/index", [
        'periodo_id' => $periodo_id,  // Pasamos el valor de periodo_id
        'carrera_id' => $carrera_id,  // Pasamos el valor de carrera_id
        'periodos' => $periodos,      // Pasamos todos los periodos
        'carreras' => $carreras,      // Pasamos todas las carreras
    ]);
}


    

   

public function store(Request $request)
{
    foreach ($request->all() as $key => $value) {
        if (substr($key, 0, 1) == 'm') {
            $existe = $this->ma->firstWhere('materia_id', $request->$key);
            if (is_null($existe) and $this->periodo_id != "-1" and $this->carrera_id != "-1") {
                MateriaAbierta::create([
                    'periodo_id' => $this->periodo_id,
                    'carrera_id' => $this->carrera_id,
                    'materia_id' => $value
                ]);
            }
        }

        if (request()->eliminar and request()->eliminar !="NOELIMINAR"){
            $existe = MateriaAbierta::where('materia_id', $request->eliminar)
                                    ->where('periodo_id',$this->periodo_id)
                                    ->delete();
            return redirect()->route('materiasa.index');        
        }
    }
    return redirect()->route('materiasa.index');
}



    
    

}