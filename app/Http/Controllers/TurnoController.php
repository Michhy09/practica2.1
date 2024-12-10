<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Alumno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    
    public function index()
    {
        $alumnos = Alumno::all();
        $turnos = Turno::with('alumno')->get(); // Traer turnos con sus alumnos relacionados
        return view('turnos.index', compact('turnos', 'alumnos'));
    }

    public function create()
    {
        $alumnos = Alumno::all(); // Lista de alumnos para el formulario
        return view('turnos/frm', compact('alumnos'));
    }

    // Crear turno
public function store(Request $request)
{
    $request->validate([
        'fecha' => 'required|date',
        'hora' => 'required|date_format:H:i', // Validación de hora en formato 24 horas
        'codigocanal' => 'required|string|max:255',
        'alumnos_id' => 'required|exists:alumnos,id', 
    ]);

    Turno::create($request->all()); // Crear el turno con los datos

    return redirect()->route('turnos.index')->with('success', 'Turno creado exitosamente');
}

// Actualizar turno
public function update(Request $request, Turno $turno)
{
   

    // Actualizar el turno
    $turno->update([
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'codigocanal' => $request->codigocanal,
        'alumnos_id' => $request->alumnos_id,
    ]);

    // Redirigir al índice con un mensaje de éxito
    return redirect()->route('turnos.index')->with('success', 'Turno actualizado correctamente.');
}


public function edit(Turno $turno)
{
    $turnos = Turno::with('alumno')->get(); // Traer turnos con sus alumnos relacionados

    $alumnos = Alumno::all(); // Obtener todos los alumnos
    return view('turnos.edit', compact('turno', 'alumnos', 'turnos')); // Pasar el turno y los alumnos
}


    
    public function destroy(Turno $turno)
    {
        $turno->delete();

        return redirect()->route('turnos.index')->with('success', 'Turno eliminado exitosamente.');
    }
}

