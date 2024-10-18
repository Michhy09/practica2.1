<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
            'idpuesto' => ['required'],
            'nombre' => 'required',
            'tipo' => 'required'
      ];

    }

    public function index()
    {
        $puestos = Puesto::paginate(5);
        return view("puestos/index", compact("puestos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puestos = Puesto::paginate(5);
        $puesto = new Puesto();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("puestos/frm" , compact("puestos", "puesto", "accion", 'txtbtn', 'des'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Puesto::create($val);
        //return $request;
        return redirect()->route("puestos.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Puesto $puesto)
   {
       $puestos = Puesto::paginate(5);
       $accion = "D"; // Acción para mostrar detalles
       $des = "";
       $txtbtn="Regresar";
       return view("puestos/frm", compact("puestos", 'puesto', 'accion', 'des', 'txtbtn'));
   }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puesto $puesto)
    {

        $puestos = Puesto::paginate(5);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("puestos/frm", compact("puestos", 'puesto', "accion", 'txtbtn', 'des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puesto $puesto)
    {
        $val = $request->validate($this->val);
        $puesto->update($val);
        return redirect()->route("puestos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return redirect()->route("puestos.index");
    }
}
