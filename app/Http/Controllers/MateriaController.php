<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Reticula;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
  public $val;

  public function __construct()
  {
      $this->val = [
          'idmateria' => ['required'],
          'nombre' => 'required',
          'nivel' => 'required',
          'nombremediano' => 'required',
          'nombrecorto' => 'required',
          'modalidad' => 'required',
          'idReticula' => 'required'
      ];
  }

  // Mostrar la lista de materias
  public function index()
  {
      $materias = Materia::simplePaginate(5);
      return view("materias.index", compact("materias"));
  }

  /**
   * Mostrar el formulario para crear una nueva materia.
   */
  public function create()
{
    $materias = Materia::simplePaginate(5);
    $materia = new Materia();  // Iniciar un objeto vacío para crear una nueva materia
    $accion = "C";  // Acción para la vista (puedes usar esto para mostrar "Crear" en el formulario)
    $txtbtn = "Insertar";  // Texto del botón para el formulario
    $des = "";  // Un string vacío para el campo disabled si es necesario
    $reticulas = Reticula::all();  // Obtener todas las retículas disponibles

    return view("materias.frm", compact("materia", "accion", 'txtbtn', 'des', 'reticulas', 'materias'));
}

  /**
   * Almacenar la nueva materia en la base de datos.
   */
  public function store(Request $request)
  {
      $val = $request->validate($this->val);
      Materia::create($val);
      return redirect()->route("materias.index")->with("mensaje", "Materia insertada correctamente. :) ");
  }

  /**
   * Mostrar los detalles de una materia específica.
   */
  public function show(Materia $materia)
  {
    $materias = Materia::simplePaginate(5);
      $accion = "D"; // Acción para mostrar detalles
      $des = "disabled";
      $txtbtn = "Regresar";
      $reticulas = Reticula::all(); // Obtener todas las retículas disponibles
      return view("materias.frm", compact('materia', 'accion', 'des', 'txtbtn', 'reticulas', 'materias'));
  }

  /**
   * Mostrar el formulario para editar una materia.
   */
  public function edit(Materia $materia)
  {
    $materias = Materia::simplePaginate(5);
      $accion = "E";
      $txtbtn = "Actualizar";
      $des = "";
      $reticulas = Reticula::all(); // Obtener todas las retículas disponibles
      return view("materias.frm", compact('materia', 'accion', 'txtbtn', 'des', 'reticulas', 'materias'));
  }

  /**
   * Actualizar la materia en la base de datos.
   */
  public function update(Request $request, Materia $materia)
  {
      $val = $request->validate($this->val);
      $materia->update($val);
      return redirect()->route("materias.index")->with("mensaje", "Materia actualizada correctamente. :) ");
  }

  /**
   * Eliminar una materia de la base de datos.
   */
  public function destroy(Materia $materia)
  {
      $materia->delete();
      return redirect()->route("materias.index")->with("mensaje", "Materia eliminada correctamente. :) ");
  }

}