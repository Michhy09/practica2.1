<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/periodos', [JsonController::class, 'periodos']);
Route::get('/carreras', [JsonController::class, 'carreras']);
Route::get('/materias', [JsonController::class, 'materias']);
Route::get('/departamentos', [JsonController::class, 'departamentos']);
Route::get('/semestres', [JsonController::class, 'semestres']);
Route::get('/edificios', [JsonController::class, 'edificios']);
Route::get('/lugares', [JsonController::class, 'lugares']);

Route::get('/materiasAbiertasPorSemestre/{semestre}', [JsonController::class, 'materiasAbiertasPorSemestre']);
Route::get('/personals', [JsonController::class, 'personals']);

Route::post('/insertar-grupo', [JsonController::class, 'insertarGrupo']);

Route::post('/guardar-horario', [JsonController::class, 'guardarHorario']);
Route::delete('/eliminar-horario', [JsonController::class, 'eliminarHorario']);

Route::get('/obtener-horarios', [JsonController::class, 'obtenerHorarios']);
Route::get('/obtener-grupo/{grupo}', [JsonController::class, 'obtenerGrupo']);

Route::get('/materiasAbiertasPorCarrera/{carreraId}/semestre/{semestreId}', [JsonController::class, 'obtenerMateriasAbiertasPorCarreraSemestre']);
