<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Grupo21337;
use Illuminate\Http\Request;
use App\Models\MateriaAbierta;
use App\Models\GrupoHorario21337;

class Grupo21337Controller extends Controller
{
    public $val;

    public function __construct()
    {
        $this->val = [
            'grupo' => 'required', // Validación del grupo
            'fecha' => 'required|date',
            'descripcion' => 'required|string|max:200',
            'max_alumnos' => 'required|integer',
            'periodo_id' => 'required|exists:periodos,id', // Asegura que el periodo exista
            'personal_id' => 'nullable|exists:personals,id', // Acepta nulos
            'materia_abierta_id' => 'required|exists:materia_abiertas,id', // Asegura que la materia abierta exista
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $materiasAbiertas = MateriaAbierta::with('materia', 'periodo', 'carrera')->get();
        $grupos = Grupo21337::simplePaginate(5);
        return view("grupo21337.index21337", compact("grupos", 'materiasAbiertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = Grupo21337::simplePaginate(5);
    
        $grupo = new Grupo21337();
        $periodos = Periodo::all();
        $personals = Personal::all();
        $materiasAbiertas = MateriaAbierta::with('materia', 'periodo', 'carrera')->get();        
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("grupo21337.frm21337", compact("grupos", "grupo","periodos", "personals", "materiasAbiertas", "grupo", "accion", "txtbtn", "des"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $val = $request->validate($this->val);

    // Crear el registro y capturar el modelo recién creado
    $grupo = Grupo21337::create($val);

    // Redirigir al formulario de edición con el ID del grupo creado
    return redirect()->route("grupo21337.edit", $grupo->id)
                     ->with("mensaje", "Se insertó correctamente. Ahora puedes editar el grupo.");
}


    /**
     * Display the specified resource.
     */
    public function show(Grupo21337 $grupo)
{
    $grupos = Grupo21337::simplePaginate(5);
    $periodos = Periodo::all();
    $personals = Personal::all();
    $materiasAbiertas = MateriaAbierta::with('materia', 'periodo', 'carrera')->get();
    $accion = "D";  // Detalles
    $txtbtn = "Regresar";
    $des = "disabled";  // Deshabilitado
    return view("grupo21337.frm21337", compact("grupos", "periodos", "personals", "materiasAbiertas", "grupo", "accion", "txtbtn", "des"));
}

    public function edit(Grupo21337 $grupo)
    {
        $grupos = Grupo21337::simplePaginate(5);
        $periodos = Periodo::all();
        $personals = Personal::all();
        $materiasAbiertas = MateriaAbierta::with('materia', 'periodo', 'carrera')->get();  
        $horarios = GrupoHorario21337::simplePaginate(5); // Carga el horario específico
        $lugares = Lugar::all(); // Todos los lugares
        // Cargar el horario por defecto
    $horario = new GrupoHorario21337([
        'grupo_id' => $grupo->id, // Grupo recién insertado
        'dia' => 'lunes', // Día predeterminado
        'hora' => '07-08', // Hora predeterminada
    ]);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("grupo21337.frm21337", compact("grupos", "periodos", "personals", "materiasAbiertas", "grupo", "accion", "txtbtn", "des", 'horarios', 'lugares', 'horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo21337 $grupo)
    {
        $val = $request->validate($this->val);
    
        // Actualiza los datos del grupo
        $grupo->update($val);
    
        // Redirige de nuevo al formulario de edición con un mensaje de éxito
        return redirect()->route("grupo21337.edit", $grupo->id)
            ->with("mensaje", "El grupo se actualizó correctamente y puedes seguir editando.");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo21337 $grupo)
{
    $grupo->delete();
    return redirect()->route("grupo21337.index21337")->with("mensaje", "Se eliminó correctamente. :)");
}

}
