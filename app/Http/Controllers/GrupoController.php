<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Edificio;
use App\Models\Personal;
use App\Models\GrupoHorario;
use Illuminate\Http\Request;
use App\Models\MateriaAbierta;
use Illuminate\Support\Facades\DB;


class GrupoController extends Controller
{
    public function index(Request $request, $accion = 'C')
{
    // Validar que la acción sea válida
    if (!in_array($accion, ['C', 'E', 'D'])) {
        abort(404, 'Acción no válida');
    }

    // Obtener los valores de las sesiones
    $periodo_id = session('periodo_id');
    $carrera_id = session('carrera_id');

    // Obtener datos necesarios para la vista
    $periodos = Periodo::all();
    $edificios = Edificio::with('lugares')->get();
    $lugares = $edificios->flatMap(fn($edificio) => $edificio->lugares);
    $materias = Materia::all();
    $grupo = Grupo::latest()->first();
    $horarios = $grupo ? GrupoHorario::where('grupo_id', $grupo->idGrupo)->get() : collect();
    $carreras = Carrera::with('depto')->get();
    $personales = Personal::all();

    // Pasar las variables correctamente a la vista usando compact()
    return view('asmateria.index', compact(
        'accion',
        'periodos',
        'carreras',
        'edificios',
        'materias',
        'grupo',
        'horarios',
        'personales',
        'lugares',
        'periodo_id',
        'carrera_id' // Asegúrate de pasar las variables periodo_id y carrera_id correctamente
    ));
}


public function store(Request $request)
{
    // Guardar en la sesión
    session(['periodo_id' => $request->periodo_id]);
    session(['carrera_id' => $request->carrera_id]);

    // Validación de los datos
    $validated = $request->validate([
        'grupo' => 'required|string|max:5|unique:grupos,grupo',
        'fecha' => 'required|date',
        'descripcion' => 'nullable|string|max:200',
        'max_alumnos' => 'required|integer|min:1',
        'idPeriodo' => 'required|exists:periodos,id',
        'idPersonal' => 'nullable|exists:personals,id',
    ]);

    
    // Intentar crear el grupo
    try {
        $grupo = Grupo::create([
            'grupo' => $validated['grupo'],
            'fecha' => $validated['fecha'],
            'descripcion' => $validated['descripcion'],
            'max_alumnos' => $validated['max_alumnos'],
            'periodo_id' => $validated['idPeriodo'],
            'personal_id' => $validated['idPersonal'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'grupo_id' => $grupo->id,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage(),
        ], 500);
    }
}


public function create() {
    $periodos = Periodo::all(); // Asegúrate de tener los modelos correctamente configurados
    $carreras = Carrera::all();

    return view('materiasa.index', compact('periodos', 'carreras'));
}


public function createOrEdit(Request $request, $accion = 'E')
{
    $grupo = Grupo::where('grupo', $request->input('grupo'))->first();

    if ($grupo) {
        // Si el grupo existe, carga los datos existentes
        return view('asmateria.index', compact('accion'))
            ->with('accion', 'E') // Cambia la acción a 'Editar'
            ->with('grupo', $grupo)
            ->with('horarios', $grupo->horarios); // Asume relación 'horarios' en modelo Grupo
    } else {
        // Si no existe, sigue con el flujo de creación
        return view('asmateria.index')->with('accion', 'C');
    }
}


    

    public function updateHorario(Request $request)
{
    $validated = $request->validate([
        'grupo_id' => 'required|exists:grupos,id',
        'day' => 'required|integer|min:1|max:5', // Días (L-V)
        'hour' => 'required|string', // Horario como cadena
        'action' => 'required|in:add,remove',
    ]);

    try {
        if ($validated['action'] === 'add') {
            GrupoHorario::create([
                'grupo_id' => $validated['grupo_id'],
                'dia' => $validated['day'],
                'hora' => $validated['hour'],
            ]);
        } else {
            GrupoHorario::where([
                'grupo_id' => $validated['grupo_id'],
                'dia' => $validated['day'],
                'hora' => $validated['hour'],
            ])->delete();
        }

        return response()->json(['success' => true, 'message' => 'Horario actualizado correctamente.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}




public function storeMateria(Request $request)
{
    // Validar los datos recibidos
    $validatedData = $request->validate([
        'materia_id' => 'required|exists:materias,id',
        'periodo_id' => 'required|exists:periodos,id',
        'carrera_id' => 'required|exists:carreras,id',
    ]);

    try {
        // Crear la materia abierta
        $materiaAbierta = MateriaAbierta::create([
            'materia_id' => $validatedData['materia_id'],
            'periodo_id' => $validatedData['periodo_id'],
            'carrera_id' => $validatedData['carrera_id'],
        ]);
        
        // Obtener la información de la materia, periodo y carrera
        $materia = Materia::find($validatedData['materia_id']);
        $periodo = Periodo::find($validatedData['periodo_id']);
        $carrera = Carrera::find($validatedData['carrera_id']);
        
        // Guardar en la sesión todos los datos necesarios
        session()->flash('materia_abierta_data', [
            'materia_nombre' => $materia->nombre,
            'periodo_nombre' => $periodo->periodo,
            'carrera_nombre' => $carrera->nombrecarrera,
            'materia_abierta_id' => $materiaAbierta->id,
        ]);

        return redirect()->route('materias.index')
            ->with('success', 'Materia abierta registrada con éxito')
            ->with('show_form', true); // Se usa para mostrar el formulario (si es necesario)
    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->withErrors('Error al guardar la materia abierta: ' . $e->getMessage());
    }
}






    /**
     * Guardar los horarios para el grupo.
     */
    
        
    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
