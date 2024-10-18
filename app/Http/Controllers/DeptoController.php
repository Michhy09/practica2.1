<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use Illuminate\Http\Request;

class DeptoController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
            'iddepto' => 'required',
            'nombredepto' => 'required',
            'nombrecorto' => 'required',
            'nombremediano' => 'required',
            
      ];

    }

    public function index()
    {
        $deptos = Depto::paginate(5);
        return view("depto/index", compact("deptos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deptos = Depto::paginate(5);
        $depto = new Depto();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("depto/frm" , compact("deptos", "depto", "accion", 'txtbtn', 'des'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Depto::create($val);
        //return $request;
        return redirect()->route("depto.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Depto $depto)
    {
        $deptos = Depto::paginate(5);
        $accion = "D";
        $txtbtn = "Confirmar la eliminacion";
        $des = "disabled";
        return view("depto/frm" , compact("deptos", 'depto','txtbtn', 'accion', 'des'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depto $depto)
    {

        $deptos = Depto::paginate(5);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("depto/frm", compact("deptos", 'depto', "accion", 'txtbtn', 'des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depto $depto)
    {
        $val = $request->validate($this->val);
        $depto->update($val);
        return redirect()->route("depto.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depto $depto)
    {
        $depto->delete();
        return redirect()->route("depto.index");
    }
}
