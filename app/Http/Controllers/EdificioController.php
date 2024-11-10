<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
   
        public $val;
        
        public function __construct()
        {
            $this->val = [
                'nombreedificio' => 'required',
                'nombrecorto' => 'required',
            ];
        }
    
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $edificios = Edificio::simplePaginate(5); // Paginación
            return view("edificio.index", compact("edificios"));
        }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $edificios = Edificio::simplePaginate(5);
            $edificio = new Edificio();
            $accion = "C";
            $txtbtn = "Insertar";
            $des = "";
            return view("edificio.frm", compact("edificios", "edificio", "accion", "txtbtn", "des"));
        }
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $val = $request->validate($this->val);
            Edificio::create($val);
            return redirect()->route("edificio.index")->with("mensaje", "Se insertó correctamente. :) ");
        }
    
        /**
         * Display the specified resource.
         */
        public function show(Edificio $edificio)
        {
            $edificios = Edificio::simplePaginate(5);
            $accion = "D";
            $txtbtn = "Regresar";
            $des = "disabled";
            return view("edificio.frm", compact("edificios", 'edificio', 'txtbtn', 'accion', 'des'));
        }
    
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Edificio $edificio)
        {
            $edificios = Edificio::simplePaginate(5);
            $accion = "E";
            $txtbtn = "Actualizar";
            $des = "";
            return view("edificio.frm", compact("edificios", "accion", "txtbtn", "des", 'edificio'));
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Edificio $edificio)
        {
            $val = $request->validate($this->val);
            $edificio->update($val);
            return redirect()->route("edificio.index")->with("mensaje", "Se actualizó correctamente. :) ");
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Edificio $edificio)
        {
            $edificio->delete();
            return redirect()->route("edificio.index")->with("mensaje", "Se eliminó correctamente. :) ");
        }
    }
    
