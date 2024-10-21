<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
            'idcarrera' => 'required',
            'nombrecarrera' => 'required',
            'nombrecorto' => 'required',
            'nombremediano' => 'required',
            'depto_id' => 'required'
            
      ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras = Carrera::with('depto')->simplePaginate(5); // Carga las carreras con sus departamentos
    return view("carrera/index", compact("carreras"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $carreras = Carrera::simplePaginate(5);
    $deptos = Depto::all(); // Obtener todos los departamentos
    
    $carrera = new Carrera();
    $accion = "C";
    $txtbtn = "Insertar";
    $des = "";
    return view("carrera/frm", compact("carreras", "carrera", "deptos", "accion", "txtbtn", "des"));
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $val = $request->validate($this->val);
    Carrera::create($val);
    return redirect()->route("carrera.index")->with("mensaje", "Se insertó correctamente. :) ");
    }



    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        $carreras = Carrera::simplePaginate(5);
        $deptos = Depto::all(); // Obtener todos los departamentos
        $accion = "D";
        $txtbtn = "Regresar";
        $des = "disabled";
        return view("carrera/frm" , compact("carreras", 'carrera','txtbtn', 'accion', 'des', 'deptos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
{
    
    $carreras = Carrera::simplePaginate(5);
    $deptos = Depto::all(); // Obtener todos los departamentos
    $accion = "E"; // Indicador de que se está editando
    $txtbtn = "Actualizar"; // Texto del botón
    $des = ""; // Habilitar campos
    return view("carrera/frm", compact("carrera", "deptos", "carreras", "accion", "txtbtn", "des"));
}


    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
    $val = $request->validate($this->val);
    $carrera->update($val);
    return redirect()->route("carrera.index")->with("mensaje", "Se actualizó correctamente. :) ");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route("carrera.index");
    }
}
