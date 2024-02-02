<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Agrupación para rutas relacionadas con Alumnos
Route::prefix('/alumnos')->group(function () {
    Route::get('/', [AlumnoController::class, 'getAll']);
    Route::get('/{id}', [AlumnoController::class, 'getById']);
    Route::post('/', [AlumnoController::class, 'create']);
    Route::put('/{id}', [AlumnoController::class, 'update']);
    Route::delete('/{id}', [AlumnoController::class, 'destroy']);
});

// Agrupación para rutas relacionadas con Asignaturas
Route::prefix('/asignaturas')->group(function () {
    Route::get('/', [AsignaturaController::class, 'getAll']);
    Route::get('/{id}', [AsignaturaController::class, 'getById']);
    Route::post('/', [AsignaturaController::class, 'create']);
    Route::put('/{id}', [AsignaturaController::class, 'update']);
    Route::delete('/{id}', [AsignaturaController::class, 'destroy']);
});

// Agrupación para rutas relacionadas con Profesores
Route::prefix('/profesores')->group(function () {
    Route::get('/', [ProfesorController::class, 'getAll']);
    Route::get('/{id}', [ProfesorController::class, 'getById']);
    Route::post('/', [ProfesorController::class, 'create']);
    Route::put('/{id}', [ProfesorController::class, 'update']);
    Route::delete('/{id}', [ProfesorController::class, 'destroy']);
});

// Agrupación para rutas relacionadas con Calificaciones
Route::prefix('/calificaciones')->group(function () {
    Route::get('/', [CalificacionController::class, 'getAll']);
    Route::get('/{id}', [CalificacionController::class, 'getById']);
    Route::post('/', [CalificacionController::class, 'create']);
    Route::put('/{id}', [CalificacionController::class, 'update']);
    Route::delete('/{id}', [CalificacionController::class, 'destroy']);
});
