<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use App\Models\Personal;
use Illuminate\Http\Request;
use App\Models\PersonalPlaza;

class PersonalPlazaController extends Controller
{
    public $val;
    
    public function __construct()
    {
        $this->val = [
            'tiponombramiento' => 'required',
            'plaza_id' => 'required',
            'personal_id' => 'required'
        ];
    }

    public function index()
    {
        $personales = Personal::all(); // Obtener todos los registros de personal
        $plazas = Plaza::all(); // Obtener todas las plazas
        $personalPlazas = PersonalPlaza::with('personal', 'plaza')->simplePaginate(5); // Paginación y carga de relaciones
        return view("personaPla.index", compact("personalPlazas", "personales", "plazas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personales = Personal::all();
        $plazas = Plaza::all();
        $personalPlaza = new PersonalPlaza();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("personaPla.frm", compact("personalPlaza", "personales", "plazas", "accion", "txtbtn", "des"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        PersonalPlaza::create($val);
        return redirect()->route("personaPla.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalPlaza $personalPlaza)
    {
        $personales = Personal::all();
        $plazas = Plaza::all();
        $accion = "D";
        $txtbtn = "Regresar";
        $des = "disabled";
        return view("personaPla.frm", compact("personalPlaza", "personales", "plazas", "accion", "txtbtn", "des"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalPlaza $personalPlaza)
    {
        $personales = Personal::all();
        $plazas = Plaza::all();
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("personaPla.frm", compact("personalPlaza", "personales", "plazas", "accion", "txtbtn", "des"));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalPlaza $personalPlaza)
    {
        $val = $request->validate($this->val);
        $personalPlaza->update($val);
        return redirect()->route("personaPla.index")->with("mensaje", "Se actualizó correctamente. :) ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalPlaza $personalPlaza)
    {
        $personalPlaza->delete();
        return redirect()->route("personaPla.index")->with("mensaje", "Se eliminó correctamente. :) ");
    }
}
