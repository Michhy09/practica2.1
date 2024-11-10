<?php
use App\Models\Depto;
use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoraController;
use App\Http\Controllers\DeptoController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EdificioController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ReticulaController;
use App\Http\Controllers\PersonalPlazaController;

Route::get('/', function () {
    return view('menu1');
});
//ALUMNO//
Route::get('/alumnos.index', [AlumnoController::class, 'index'])->name('alumnos.index');

Route::get('/alumnos.create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos.store', [AlumnoController::class, 'store'])->name('alumnos.store');

Route::get('/alumnos.ver/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.ver');
Route::delete('/alumnos.destroy/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');


Route::post('/alumnos.update/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::get('/alumnos.editar/{alumno}', [AlumnoController::class, 'edit'])->name('alumnos.editar');


//PUESTOS//
Route::get('/puestos.index', [PuestoController::class, 'index'])->name('puestos.index');

Route::get('/puestos.create', [PuestoController::class, 'create'])->name('puestos.create');
Route::post('/puestos.store', [PuestoController::class, 'store'])->name('puestos.store');

Route::get('/puestos.ver/{puesto}', [PuestoController::class, 'show'])->name('puestos.ver');
Route::delete('/puestos.destroy/{puesto}', [PuestoController::class, 'destroy'])->name('puestos.destroy');


Route::post('/puestos.update/{puesto}', [PuestoController::class, 'update'])->name('puestos.update');
Route::get('/puestos.editar/{puesto}', [PuestoController::class, 'edit'])->name('puestos.editar');

// PLAZAS //

Route::get('/plazas.index', [PlazaController::class, 'index'])->name('plazas.index');

Route::get('/plazas.create', [PlazaController::class, 'create'])->name('plazas.create');
Route::post('/plazas.store', [PlazaController::class, 'store'])->name('plazas.store');

Route::get('/plazas.ver/{plaza}', [PlazaController::class, 'show'])->name('plazas.ver');
Route::delete('/plazas.destroy/{plaza}', [PlazaController::class, 'destroy'])->name('plazas.destroy');


Route::post('/plazas.update/{plaza}', [PlazaController::class, 'update'])->name('plazas.update');
Route::get('/plazas.editar/{plaza}', [PlazaController::class, 'edit'])->name('plazas.editar');

//DEPTOS//
Route::get('/depto.index', [DeptoController::class, 'index'])->name('depto.index');

Route::get('/depto.create', [DeptoController::class, 'create'])->name('depto.create');
Route::post('/depto.store', [DeptoController::class, 'store'])->name('depto.store');

Route::get('/depto.ver/{depto}', [DeptoController::class, 'show'])->name('depto.ver');
Route::delete('/depto.destroy/{depto}', [DeptoController::class, 'destroy'])->name('depto.destroy');


Route::post('/depto.update/{depto}', [DeptoController::class, 'update'])->name('depto.update');
Route::get('/depto.editar/{depto}', [DeptoController::class, 'edit'])->name('depto.editar');


//CARRERAS//
Route::get('/carrera.index', [CarreraController::class, 'index'])->name('carrera.index');

Route::get('/carrera.create', [CarreraController::class, 'create'])->name('carrera.create');
Route::post('/carrera.store', [CarreraController::class, 'store'])->name('carrera.store');

Route::get('/carrera.ver/{carrera}', [CarreraController::class, 'show'])->name('carrera.ver');
Route::delete('/carrera.destroy/{carrera}', [CarreraController::class, 'destroy'])->name('carrera.destroy');


Route::post('/carrera.update/{carrera}', [CarreraController::class, 'update'])->name('carrera.update');
Route::get('/carrera.editar/{carrera}', [CarreraController::class, 'edit'])->name('carrera.editar');


//PERIODOS//
Route::get('/periodos.index', [PeriodoController::class, 'index'])->name('periodos.index');

Route::get('/periodos.create', [PeriodoController::class, 'create'])->name('periodos.create');
Route::post('/periodos.store', [PeriodoController::class, 'store'])->name('periodos.store');

Route::get('/periodos.ver/{periodo}', [PeriodoController::class, 'show'])->name('periodos.ver');
Route::delete('/periodos.destroy/{periodo}', [PeriodoController::class, 'destroy'])->name('periodos.destroy');


Route::post('/periodos.update/{periodo}', [PeriodoController::class, 'update'])->name('periodos.update');
Route::get('/periodos.editar/{periodo}', [PeriodoController::class, 'edit'])->name('periodos.editar');


//RETICULAS//
Route::get('/reticulas.index', [ReticulaController::class, 'index'])->name('reticulas.index');

Route::get('/reticulas.create', [ReticulaController::class, 'create'])->name('reticulas.create');
Route::post('/reticulas.store', [ReticulaController::class, 'store'])->name('reticulas.store');

Route::get('/reticulas.ver/{reticula}', [ReticulaController::class, 'show'])->name('reticulas.ver');
Route::delete('/reticulas.destroy/{reticula}', [ReticulaController::class, 'destroy'])->name('reticulas.destroy');


Route::post('/reticulas.update/{reticula}', [ReticulaController::class, 'update'])->name('reticulas.update');
Route::get('/reticulas.editar/{reticula}', [ReticulaController::class, 'edit'])->name('reticulas.editar');

// PERSONAAAL
Route::get('/personal.index', [PersonalController::class, 'index'])->name('personal.index');

Route::get('/personal.create', [PersonalController::class, 'create'])->name('personal.create');
Route::post('/personal.store', [PersonalController::class, 'store'])->name('personal.store');

Route::get('/personal.ver/{persona}', [PersonalController::class, 'show'])->name('personal.ver');
Route::delete('/personal.destroy/{persona}', [PersonalController::class, 'destroy'])->name('personal.destroy');


Route::post('/personal.update/{persona}', [PersonalController::class, 'update'])->name('personal.update');
Route::get('/personal.editar/{persona}', [PersonalController::class, 'edit'])->name('personal.editar');


// PERSONAAAL-PLAZA
Route::get('/personaPla.index', [PersonalPlazaController::class, 'index'])->name('personaPla.index');

Route::get('/personaPla.create', [PersonalPlazaController::class, 'create'])->name('personaPla.create');
Route::post('/personaPla.store', [PersonalPlazaController::class, 'store'])->name('personaPla.store');

Route::get('/personaPla.ver/{personalPlaza}', [PersonalPlazaController::class, 'show'])->name('personaPla.ver');
Route::delete('/personaPla.destroy/{personalPlaza}', [PersonalPlazaController::class, 'destroy'])->name('personaPla.destroy');


Route::post('/personaPla.update/{personalPlaza}', [PersonalPlazaController::class, 'update'])->name('personaPla.update');
Route::get('/personaPla.editar/{personalPlaza}', [PersonalPlazaController::class, 'edit'])->name('personaPla.editar');



//MATERIAS//
Route::get('/materias.index', [MateriaController::class, 'index'])->name('materias.index');

Route::get('/materias.create', [MateriaController::class, 'create'])->name('materias.create');
Route::post('/materias.store', [MateriaController::class, 'store'])->name('materias.store');

Route::get('/materias.ver/{materia}', [MateriaController::class, 'show'])->name('materias.ver');
Route::delete('/materias.destroy/{materia}', [MateriaController::class, 'destroy'])->name('materias.destroy');


Route::post('/materias.update/{materia}', [MateriaController::class, 'update'])->name('materias.update');
Route::get('/materias.editar/{materia}', [MateriaController::class, 'edit'])->name('materias.editar');


//EDIFICIOS//
Route::get('/edificio.index', [EdificioController::class, 'index'])->name('edificio.index');

Route::get('/edificio.create', [EdificioController::class, 'create'])->name('edificio.create');
Route::post('/edificio.store', [EdificioController::class, 'store'])->name('edificio.store');

Route::get('/edificio.ver/{edificio}', [EdificioController::class, 'show'])->name('edificio.ver');
Route::delete('/edificio.destroy/{edificio}', [EdificioController::class, 'destroy'])->name('edificio.destroy');


Route::post('/edificio.update/{edificio}', [EdificioController::class, 'update'])->name('edificio.update');
Route::get('/edificio.editar/{edificio}', [EdificioController::class, 'edit'])->name('edificio.editar');


//LUGAR
Route::get('/lugar.index', [LugarController::class, 'index'])->name('lugar.index');

Route::get('/lugar.create', [LugarController::class, 'create'])->name('lugar.create');
Route::post('/lugar.store', [LugarController::class, 'store'])->name('lugar.store');

Route::get('/lugar.ver/{lugar}', [LugarController::class, 'show'])->name('lugar.ver');
Route::delete('/lugar.destroy/{lugar}', [LugarController::class, 'destroy'])->name('lugar.destroy');

Route::post('/lugar.update/{lugar}', [LugarController::class, 'update'])->name('lugar.update');
Route::get('/lugar.editar/{lugar}', [LugarController::class, 'edit'])->name('lugar.editar');


//HORAS
Route::get('/hora.index', [HoraController::class, 'index'])->name('hora.index');
Route::get('/hora.create', [HoraController::class, 'create'])->name('hora.create');
Route::post('/hora.store', [HoraController::class, 'store'])->name('hora.store');
Route::get('/hora.ver/{hora}', [HoraController::class, 'show'])->name('hora.ver');
Route::delete('/hora.destroy/{hora}', [HoraController::class, 'destroy'])->name('hora.destroy');
Route::post('/hora.update/{hora}', [HoraController::class, 'update'])->name('hora.update');
Route::get('/hora.editar/{hora}', [HoraController::class, 'edit'])->name('hora.editar');


Route::get('/dashboard', function () {
    return view('menu1');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

