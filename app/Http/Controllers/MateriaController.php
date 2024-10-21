<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Reticula;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
    'idmateria' => 'required',
    'nombre' => 'required',
    'nivel' => 'required',
    'nombremediano' => 'required',
    'nombrecorto' => 'required',
    'modalidad' => 'required',
    'idReticula' => 'required',
    
   
    
];
}

/**
* Display a listing of the resource.
*/
public function index()
{
$materias = Materia::with('reticula')->simplePaginate(5); 
return view("materias/index", compact("materias"));
}

/**
* Show the form for creating a new resource.
*/
public function create()
{
$materias = Materia::simplePaginate(5);
$reticulas = Reticula::all(); // Obtener todos los departamentos

$materia = new Materia();
$accion = "C";
$txtbtn = "Insertar";
$des = "";
return view("materias/frm", compact("materias", "materia", "reticulas", "accion", "txtbtn", "des"));
}



/**
* Store a newly created resource in storage.
*/
public function store(Request $request)
{

$val = $request->validate($this->val);
Materia::create($val);
return redirect()->route("materias.index")->with("mensaje", "Se insertó correctamente. :) ");
}



/**
* Display the specified resource.
*/
public function show(Materia $materia)
{
$materias = Materia::simplePaginate(5);
$reticulas = Reticula::all(); // Obtener todos los departamentos
$accion = "D";
$txtbtn = "Regresar";
$des = "disabled";
return view("materias/frm" , compact("materias", 'materia','txtbtn', 'accion', 'des', 'reticulas'));
}

/**
* Show the form for editing the specified resource.
*/
public function edit(Materia $materia)
{

$materias = Materia::simplePaginate(5);
$reticulas = Reticula::all(); // Obtener todos los departamentos
$accion = "E"; // Indicador de que se está editando
$txtbtn = "Actualizar"; // Texto del botón
$des = ""; // Habilitar campos
return view("materias/frm", compact("materias", "materia", "reticulas", "accion", "txtbtn", "des"));
}



/**
* Update the specified resource in storage.
*/
public function update(Request $request, Materia $materia)
{
$val = $request->validate($this->val);
$materia->update($val);
return redirect()->route("materias.index")->with("mensaje", "Se actualizó correctamente. :) ");
}


/**
* Remove the specified resource from storage.
*/
public function destroy(Materia $materia)
{
$materia->delete();
return redirect()->route("materias.index");
}
}