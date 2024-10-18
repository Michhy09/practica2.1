<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
            'nombrecarrera' => ['required', 'min:3'],
            'nombrecorto' => 'required',
            'nombremediano' => 'required',
            'iddepto' => 'required',
            
      ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras = Carrera::paginate(5);
        return view("carrera/index", compact("carreras"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $carreras = Carrera::paginate(5);
        $carrera = new Carrera();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("carrera/frm" , compact("carreras", "carrera", "accion", 'txtbtn', 'des'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Carrera::create($val);
        //return $request;
        return redirect()->route("carrera.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        $carreras = Carrera::paginate(5);
        $accion = "D";
        $txtbtn = "Confirmar la eliminacion";
        $des = "disabled";
        return view("carrera/frm" , compact("carreras", 'carrera','txtbtn', 'accion', 'des'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {

        $carreras = Carrera::paginate(5);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("carrera/frm", compact("carreras", 'carrera', "accion", 'txtbtn', 'des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $val = $request->validate($this->val);
        $carrera->update($val);
        return redirect()->route("carrera.index");
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
