<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Edificio;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    public $val;

    public function __construct()
    {
        $this->val = [
            'nombrelugar' => 'required',
            'nombrecorto' => 'required',
            'edificio_id' => 'required',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lugares = Lugar::with('edificio')->simplePaginate(5); // Incluye el edificio relacionado y paginación
        return view("lugar.index", compact("lugares"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lugares = Lugar::simplePaginate(5);
        $edificios = Edificio::all(); // Obtén todos los edificios para el dropdown
        $lugar = new Lugar();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("lugar.frm", compact("lugares", "edificios", "lugar", "accion", "txtbtn", "des"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Lugar::create($val);
        return redirect()->route("lugar.index")->with("mensaje", "Se insertó correctamente. :) ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Lugar $lugar)
    {
        $lugares = Lugar::simplePaginate(5);
        $edificios = Edificio::all();
        $accion = "D";
        $txtbtn = "Regresar";
        $des = "disabled";
        return view("lugar.frm", compact("lugares", "edificios", "lugar", "accion", "txtbtn", "des"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lugar $lugar)
    {
        $lugares = Lugar::simplePaginate(5);
        $edificios = Edificio::all(); // Obtén los edificios para el dropdown de edición
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("lugar.frm", compact("lugares", "edificios", "lugar", "accion", "txtbtn", "des"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lugar $lugar)
    {
        $val = $request->validate($this->val);
        $lugar->update($val);
        return redirect()->route("lugar.index")->with("mensaje", "Se actualizó correctamente. :) ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lugar $lugar)
    {
        $lugar->delete();
        return redirect()->route("lugar.index")->with("mensaje", "Se eliminó correctamente. :) ");
    }
}
