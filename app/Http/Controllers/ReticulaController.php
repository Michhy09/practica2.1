<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Reticula;
use Illuminate\Http\Request;

class ReticulaController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
            
            'idreticula' => 'required',
            'desc' => 'required',
            'fechaVigor' => 'required',
            'idCarrera' => 'required',
           
            
      ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reticulas = Reticula::with('carrera')->simplePaginate(5); 
    return view("reticulas/index", compact("reticulas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $reticulas = Reticula::simplePaginate(5);
    $carreras = Carrera::all(); // Obtener todos los departamentos
    
    $reticula = new Reticula();
    $accion = "C";
    $txtbtn = "Insertar";
    $des = "";
    return view("reticulas/frm", compact("reticulas", "reticula", "carreras", "accion", "txtbtn", "des"));
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    $val = $request->validate($this->val);
    Reticula::create($val);
    return redirect()->route("reticulas.index")->with("mensaje", "Se insertó correctamente. :) ");
    }



    /**
     * Display the specified resource.
     */
    public function show(Reticula $reticula)
    {
        $reticulas = Reticula::simplePaginate(5);
        $carreras = Carrera::all(); // Obtener todos los departamentos
        $accion = "D";
        $txtbtn = "Regresar";
        $des = "disabled";
        return view("reticulas/frm" , compact("reticulas", 'reticula','txtbtn', 'accion', 'des', 'carreras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reticula $reticula)
{
    
    $reticulas = Reticula::simplePaginate(5);
    $carreras = Carrera::all(); // Obtener todos los departamentos
    $accion = "E"; // Indicador de que se está editando
    $txtbtn = "Actualizar"; // Texto del botón
    $des = ""; // Habilitar campos
    return view("reticulas/frm", compact("reticulas", "carreras", "reticula", "accion", "txtbtn", "des"));
}


    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reticula $reticula)
    {
    $val = $request->validate($this->val);
    $reticula->update($val);
    return redirect()->route("reticulas.index")->with("mensaje", "Se actualizó correctamente. :) ");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reticula $reticula)
    {
        $reticula->delete();
        return redirect()->route("reticulas.index");
    }
}
