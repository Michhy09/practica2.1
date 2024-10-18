<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public $val;
    public function __construct(){
      $this-> val = [
        'noctrl' => 'required',
            'nombre' => 'required',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'sexo' => 'required',
            'carrera'  => 'required',
            
            
      ];
    }
    

    /**
    
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::paginate(5);
        return view("alumnos/index", compact("alumnos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumno::paginate(5);
        $alumno = new Alumno();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("alumnos/frm" , compact("alumnos", "alumno", "accion", 'txtbtn', 'des'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Alumno::create($val);
        //return $request;
        return redirect()->route("alumnos.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
   
   public function show(Alumno $alumno)
   {
       $alumnos = Alumno::paginate(5);
       $accion = "D"; // Acción para mostrar detalles
       $des = "";
       $txtbtn="Regresar";
       return view("alumnos/frm", compact("alumnos", 'alumno', 'accion', 'des', 'txtbtn'));
   }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {

        $alumnos = Alumno::paginate(5);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("alumnos/frm", compact("alumnos", 'alumno', "accion", 'txtbtn', 'des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $val = $request->validate($this->val);
        $alumno->update($val);
        return redirect()->route("alumnos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route("alumnos.index");
    }
}
