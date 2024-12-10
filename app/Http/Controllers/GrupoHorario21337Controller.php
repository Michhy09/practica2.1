<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Grupo21337;
use App\Models\Lugar;
use Illuminate\Http\Request;
use App\Models\GrupoHorario21337;
use Database\Seeders\LugarSeeder;

class GrupoHorario21337Controller extends Controller
{
    public function index()
{
    // Traemos todos los horarios
    $horarios = GrupoHorario21337::simplePaginate(5);
    
    // Asegurándote de obtener los grupos desde el modelo correcto
    $grupos = Grupo::all(); // Usamos el modelo 'Grupo' para obtener los grupos
    
    // Traemos todos los lugares
    $lugares = Lugar::all();

    // Pasamos las variables a la vista de forma coherente con los nombres
    return view('horario21337.index21337', compact('horarios', 'lugares', 'grupos'));
}

public function create()
{
    $horarios = GrupoHorario21337::simplePaginate(5);

    // Traemos todos los grupos y lugares para el formulario de creación
    $grupos = Grupo21337::all();
    $horario = new GrupoHorario21337();

    $lugares = Lugar::all();
    $accion = "C";
    $txtbtn = "Insertar";
    $des = "";
    return view('horario21337.frm21337', compact('grupos','horarios', 'lugares', 'accion', 'txtbtn', 'des', 'horario'));
}

public function store(Request $request)
{
    // Validación de los datos del formulario
    $request->validate([
        'dia' => 'required',
        'hora' => 'required',
        'grupo_id' => 'required|exists:grupo21337s,id',
        'lugar_id' => 'required|exists:lugars,id',
    ]);

    // Creación del nuevo horario
    GrupoHorario21337::create($request->only(['dia', 'hora', 'grupo_id', 'lugar_id']));

    return redirect()->route('horario21337.index21337')->with('success', 'Horario creado correctamente');
}

public function edit( GrupoHorario21337 $horario)
{
    // Busca el horario por ID
    $horarios = GrupoHorario21337::simplePaginate(5); // Carga el horario específico
    $grupos = Grupo21337::all(); // Todos los grupos
    $lugares = Lugar::all(); // Todos los lugares

    $accion = "E";
    $txtbtn = "Actualizar";
    $des = "";
    
    // Envía los datos al formulario
    return view('horario21337.frm21337', compact('horario', 'grupos', 'lugares', 'accion', 'txtbtn', 'des', 'horarios'));
}


public function update(Request $request, GrupoHorario21337 $horario)
{
    // Validación de los datos del formulario
    $request->validate([
        'dia' => 'required',
        'hora' => 'required|date_format:H:i',
        'grupo_id' => 'required|exists:grupo21337s,id',
        'lugar_id' => 'required|exists:lugars,id',
    ]);

    // Actualizamos el grupo horario
    $horario->update($request->only(['dia', 'hora', 'grupo_id', 'lugar_id']));

    return redirect()->route('horario21337.index21337')->with('success', 'Horario actualizado correctamente');
}

public function show(GrupoHorario21337 $horario)
{
    $horarios = GrupoHorario21337::simplePaginate(5);
    $grupos = Grupo21337::all();
    $lugares = Lugar::all();
    $accion = "D";  // Detalles
    $txtbtn = "Regresar";
    $des = "disabled";  // Deshabilitado
    return view("horario21337.frm21337", compact('horarios', 'grupos', 'lugares', 'accion','txtbtn', 'des', 'horario'));
}


public function destroy($horario)
{
    // Eliminamos el grupo horario
    $grupoHorario = GrupoHorario21337::findOrFail($horario);
    $grupoHorario->delete();

    return redirect()->route('horario21337.index21337')->with('success', 'Horario eliminado correctamente');
}
}