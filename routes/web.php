<?php
use App\Models\Alumno;
use App\Models\Depto;
use App\Models\Carrera;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeptoController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('menu1');
});
//ALUMNO//
Route::get('/alumnos.index', [AlumnoController::class, 'index'])->name('alumnos.index');

Route::get('/alumnos.create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('/alumnos.store', [AlumnoController::class, 'store'])->name('alumnos.store');

Route::get('/alumnos.ver/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.ver');
Route::get('/alumnos.destroy/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');


Route::post('/alumnos.update/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::get('/alumnos.editar/{alumno}', [AlumnoController::class, 'edit'])->name('alumnos.editar');


//PUESTOS//
Route::get('/puestos.index', [PuestoController::class, 'index'])->name('puestos.index');

Route::get('/puestos.create', [PuestoController::class, 'create'])->name('puestos.create');
Route::post('/puestos.store', [PuestoController::class, 'store'])->name('puestos.store');

Route::get('/puestos.ver/{puesto}', [PuestoController::class, 'show'])->name('puestos.ver');
Route::get('/puestos.destroy/{puesto}', [PuestoController::class, 'destroy'])->name('puestos.destroy');


Route::post('/puestos.update/{puesto}', [PuestoController::class, 'update'])->name('puestos.update');
Route::get('/puestos.editar/{puesto}', [PuestoController::class, 'edit'])->name('puestos.editar');

// PLAZAS //

Route::get('/plazas.index', [PlazaController::class, 'index'])->name('plazas.index');

Route::get('/plazas.create', [PlazaController::class, 'create'])->name('plazas.create');
Route::post('/plazas.store', [PlazaController::class, 'store'])->name('plazas.store');

Route::get('/plazas.ver/{plaza}', [PlazaController::class, 'show'])->name('plazas.ver');
Route::get('/plazas.destroy/{plaza}', [PlazaController::class, 'destroy'])->name('plazas.destroy');


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
Route::get('/carrera.destroy/{carrera}', [CarreraController::class, 'destroy'])->name('carrera.destroy');


Route::post('/carrera.update/{carrera}', [CarreraController::class, 'update'])->name('carrera.update');
Route::get('/carrera.editar/{carrera}', [CarreraController::class, 'edit'])->name('carrera.editar');





Route::get('/dashboard', function () {
    return view('menu1');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

