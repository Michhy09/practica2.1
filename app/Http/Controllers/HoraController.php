<?php

namespace App\Http\Controllers;

use App\Models\Hora;
use Illuminate\Http\Request;

class HoraController extends Controller
{
    public $val;

    public function __construct()
    {
        $this->val = [
            'hora_ini' => 'required',
            'hora_fin' => 'required',
        ];
    }

    public function index()
    {
        $horas = Hora::simplePaginate(5);
        return view("hora.index", compact("horas"));
    }

    public function create()
    {
        $horas = Hora::simplePaginate(5);
        $hora = new Hora();
        $accion = "C";
        $txtbtn = "Insertar";
        $des = "";
        return view("hora.frm", compact("horas", "hora", "accion", "txtbtn", "des"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Hora::create($val);
        return redirect()->route("hora.index")->with("mensaje", "Hora registrada correctamente.");
    }

    public function show(Hora $hora)
    {
        $horas = Hora::simplePaginate(5);
        $accion = "D";
        $txtbtn = "Regresar";
        $des = "disabled";
        return view("hora.frm", compact("horas", 'hora', 'txtbtn', 'accion', 'des'));
    }

    public function edit(Hora $hora)
    {
        $horas = Hora::simplePaginate(5);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("hora.frm", compact("horas", "accion", "txtbtn", "des", 'hora'));
    }

    public function update(Request $request, Hora $hora)
    {
        $val = $request->validate($this->val);
        $hora->update($val);
        return redirect()->route("hora.index")->with("mensaje", "Hora actualizada correctamente.");
    }

    public function destroy(Hora $hora)
    {
        $hora->delete();
        return redirect()->route("hora.index")->with("mensaje", "Hora eliminada correctamente.");
    }
}
