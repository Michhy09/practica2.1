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
            'carrera_id' => 'required',
            
      ];
    }
    

    /**
    
     * Display a listing of the resource.
     */
    public function index()
{
    $alumnos = Alumno::with('carrera')->simplePaginate(5); // Carga los alumnos con sus carreras
    $carreras = Carrera::all(); // Carga todas las carreras si las necesitas
    return view("alumnos.index", compact("alumnos", "carreras")); // Pasa ambas variables
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumno::paginate(5);
        $alumno = new Alumno();
        $carreras = Carrera::all(); // Obtener todas las carreras
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("alumnos/frm", compact("alumnos", "alumno", "accion", 'txtbtn', 'des', 'carreras')); // Agrega 'carreras' al compact
    }
    
    public function edit(Alumno $alumno)
    {
        $alumnos = Alumno::paginate(5);
        $carreras = Carrera::all(); // Obtener todas las carreras
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("alumnos/frm", compact("alumnos", 'alumno', "accion", 'txtbtn', 'des', 'carreras')); // Agrega 'carreras' al compact
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
       $carreras = Carrera::all();
       $accion = "D"; // Acción para mostrar detalles
       $des = "disabled";
       $txtbtn="Regresar";
       return view("alumnos/frm", compact("alumnos", 'alumno', 'accion', 'des', 'txtbtn', 'carreras'));
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
