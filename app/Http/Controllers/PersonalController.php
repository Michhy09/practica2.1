<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Personal;
use App\Models\Puesto;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public $val;
    
    public function __construct()
    {
        $this->val = [
            'RFC' => 'required',
            'nombres' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'fechaingsep' => 'required',
            'fechaingins' => 'required',
            'depto_id' => 'required',
            'puesto_id' => 'required',

            'licenciatura' => 'required',
            'especializacion' => 'nullable',
            'maestria' => 'nullable',
            'doctorado' => 'nullable',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $deptos = Depto::all(); // Obtener todos los departamentos
    $puestos = Puesto::all(); // Obtener todos los puestos    
    $personal = Personal::with('depto')->with('puesto')->simplePaginate(5); // Paginación
    return view("personal.index", compact("personal", "deptos", "puestos"));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $personal = Personal::simplePaginate(5);
    $deptos = Depto::all(); // Obtener todos los departamentos
    $puestos = Puesto::all(); // Obtener todos los puestos
    $persona = new Personal();
    $accion = "C";
    $txtbtn = "Insertar";
    $des = "";
    return view("personal.frm", compact("personal", "persona", "deptos", "puestos", "accion", "txtbtn", "des"));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all()); 
        $val = $request->validate($this->val);
        Personal::create($val);
        return redirect()->route("personal.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Personal $persona)
    {
        $personal = Personal::simplePaginate(5);
        $puestos = Puesto::all(); // Obtener todos los puestos
        $deptos = Depto::all(); // Obtener todos los departamentos
        $accion = "D";
        $txtbtn = "Regresar";
        $des = "disabled";
        return view("personal.frm", compact("personal", 'persona', 'txtbtn', 'accion', 'des', 'deptos', 'puestos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $persona)
{
    $personal = Personal::simplePaginate(5); // Aquí está sobrescribiendo el parámetro $personal
    $deptos = Depto::all(); // Obtener todos los departamentos
    $puestos = Puesto::all(); // Obtener todos los puestos
    $accion = "E"; // Indicador de que se está editando
    $txtbtn = "Actualizar"; // Texto del botón
    $des = ""; // Habilitar campos
    return view("personal.frm", compact("personal", "deptos", "accion", "txtbtn", "des", 'puestos', 'persona'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $persona)
    {
        $val = $request->validate($this->val);
        $persona->update($val);
        return redirect()->route("personal.index")->with("mensaje", "Se actualizó correctamente. :) ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personal $persona)
    {
        $persona->delete();
        return redirect()->route("personal.index");
    }

}
