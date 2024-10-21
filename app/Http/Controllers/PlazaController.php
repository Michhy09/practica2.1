<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use Illuminate\Http\Request;

class PlazaController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
            'idplaza' => ['required'],
            'nombrePlaza' => 'required',
            
      ];

    }

    public function index()
    {
        $plazas = Plaza::paginate(5);
        return view("plazas/index", compact("plazas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plazas = Plaza::paginate(5);
        $plaza = new Plaza();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("plazas/frm" , compact("plazas", "plaza", "accion", 'txtbtn', 'des'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Plaza::create($val);
        //return $request;
        return redirect()->route("plazas.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Plaza $plaza)
   {
       $plazas = Plaza::paginate(5);
       $accion = "D"; // Acción para mostrar detalles
       $des = "disabled";
       $txtbtn="Regresar";
       return view("plazas/frm", compact("plazas", 'plaza', 'accion', 'des', 'txtbtn'));
   }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plaza $plaza)
    {

        $plazas = Plaza::paginate(5);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("plazas/frm", compact("plazas", 'plaza', "accion", 'txtbtn', 'des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plaza $plaza)
    {
        $val = $request->validate($this->val);
        $plaza->update($val);
        return redirect()->route("plazas.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plaza $plaza)
    {
        $plaza->delete();
        return redirect()->route("plazas.index");
    }
}
