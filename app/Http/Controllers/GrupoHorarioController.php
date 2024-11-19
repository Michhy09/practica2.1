<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Edificio;
use App\Models\Grupo;
use App\Models\Personal;
use App\Models\GrupoHorario;
use Illuminate\Http\Request;

class GrupoHorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Obtener el último grupo insertado
    $grupo = Grupo::latest()->first();

    if (!$grupo) {
        return redirect()->back()->with('error', 'No hay grupos disponibles.');
    }

    // Obtener horarios relacionados al grupo
    $horarios = GrupoHorario::where('grupo_id', $grupo->id)->get();

    // Datos adicionales necesarios para la vista
    $periodos = Periodo::all();
    $carreras = Carrera::with('depto')->get();
    $materias = Materia::with('reticula.carrera')->get();
    $edificios = Edificio::with('lugares')->get();
    $personals = Personal::all();
    $semestres = Materia::select('semestre')->distinct()->orderBy('semestre')->get();

    // Retornar la vista con los datos necesarios
    return view('asmateria.index', compact('grupo', 'horarios', 'materias', 'periodos', 'carreras', 'edificios', 'semestres', 'personals'));
}
 
    

public function guardarHorario(Request $request)
{
    try {
        // Validar datos
        $validated = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'lugar_id' => 'required|exists:lugars,id',
            'dia' => 'required|integer|min:1|max:5', // 1: Lunes, 5: Viernes
            'hora' => 'required|date_format:H:i',
        ]);

        // Verificar empalmes
        $conflicto = GrupoHorario::where('dia', $validated['dia'])
            ->where('hora', $validated['hora'])
            ->where('lugar_id', $validated['lugar_id'])
            ->exists();

        if ($conflicto) {
            // Si hay empalme, no guardamos el horario y devolvemos mensaje de conflicto
            return response()->json([
                'empalme' => 'Horario empalmado con otro horario.'
            ], 409); // Se usa 409 para indicar conflicto
        }

        // Si no hay conflicto, se guarda el horario
        GrupoHorario::create($validated);

        return response()->json(['success' => 'Horario guardado exitosamente.']);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'error' => 'Error de validación.',
            'validation_errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error interno al guardar el horario.',
            'message' => $e->getMessage(),
        ], 500);
    }
}


public function eliminarHorario(Request $request)
{
    try {
        // Validar los datos
        $validated = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'lugar_id' => 'required|exists:lugars,id',
            'dia' => 'required|integer|min:1|max:5', // 1: Lunes, 5: Viernes
            'hora' => 'required|date_format:H:i',
        ]);

        // Eliminar el horario
        GrupoHorario::where('grupo_id', $validated['grupo_id'])
                    ->where('lugar_id', $validated['lugar_id'])
                    ->where('dia', $validated['dia'])
                    ->where('hora', $validated['hora'])
                    ->delete();

        return response()->json(['success' => 'Horario eliminado exitosamente.']);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error al eliminar el horario.',
            'message' => $e->getMessage(),
        ], 500);
    }
}







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // Validar datos
        $validated = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'lugar_id' => 'required|exists:lugares,id',
            'dia' => 'required|integer|min:1|max:5', // 1: Lunes, 5: Viernes
            'hora' => 'required|date_format:H:i',
        ]);

        // Comprobar empalmes
        $exists = GrupoHorario::where('dia', $validated['dia'])
            ->where('hora', $validated['hora'])
            ->where('lugar_id', $validated['lugar_id'])
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'Empalme detectado. El lugar ya está ocupado en esta hora y día.'], 409);
        }

        // Guardar horario
        $nuevoHorario = GrupoHorario::create($validated);

        return response()->json([
            'success' => 'Horario guardado exitosamente.',
            'data' => $nuevoHorario,
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'error' => 'Error de validación.',
            'validation_errors' => $e->errors(),
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error interno del servidor.',
            'message' => $e->getMessage(),
        ], 500);
    }
}



    /**
     * Display the specified resource.
     */
    public function show(GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $validated = $request->validate([
        'dia' => 'required|integer|min:1|max:5',
        'hora' => 'required|date_format:H:i',
        'lugar_id' => 'required|exists:lugares,id',
        'grupo_id' => 'required|exists:grupos,id',
        'action' => 'required|in:add,remove',
    ]);

    if ($validated['action'] === 'add') {
        GrupoHorario::updateOrCreate([
            'dia' => $validated['dia'],
            'hora' => $validated['hora'],
            'grupo_id' => $validated['grupo_id'],
        ], [
            'lugar_id' => $validated['lugar_id'],
        ]);
        return response()->json(['status' => 'Horario agregado con éxito.']);
    } elseif ($validated['action'] === 'remove') {
        GrupoHorario::where([
            'dia' => $validated['dia'],
            'hora' => $validated['hora'],
            'grupo_id' => $validated['grupo_id'],
        ])->delete();
        return response()->json(['status' => 'Horario eliminado con éxito.']);
    }

    return response()->json(['error' => 'Acción no válida.'], 400);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoHorario $grupoHorario)
    {
        //
    }
}
