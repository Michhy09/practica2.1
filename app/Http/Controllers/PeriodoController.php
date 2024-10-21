<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
            'idPeriodo' => ['required'],
            'periodo' => 'required',
            'descorta' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            
      ];

    }

    public function index()
    {
        $periodos = Periodo::simplePaginate(5);
        return view("periodos/index", compact("periodos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periodos = Periodo::simplePaginate(5);
        $periodo = new Periodo();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("periodos/frm" , compact("periodos", "periodo", "accion", 'txtbtn', 'des'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Periodo::create($val);
        //return $request;
        return redirect()->route("periodos.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $periodo)
   {
       $periodos = Periodo::simplePaginate(5);
       $accion = "D"; // Acción para mostrar detalles
       $des = "disabled";
       $txtbtn="Regresar";
       return view("periodos/frm", compact("periodos", 'periodo', 'accion', 'des', 'txtbtn'));
   }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodo $periodo)
    {

        $periodos = Periodo::simplePaginate(5);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("periodos/frm", compact("periodos", 'periodo', "accion", 'txtbtn', 'des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periodo $periodo)
    {
        $val = $request->validate($this->val);
        $periodo->update($val);
        return redirect()->route("periodos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return redirect()->route("periodos.index");
    }
}
