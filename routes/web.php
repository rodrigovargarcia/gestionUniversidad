<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\RegistroMateriaPorAlumnoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('filament.auth.login', 'FilamentAuthController@showLoginForm');

Route::get('/', function () {
    return view('welcome');
});

Route::get('carreras', [App\Http\Controllers\CarreraController::class, 'index']);

Route::get('carrera/{carrera}', [App\Http\Controllers\CarreraController::class, 'show']);

Route::post('carrera', [App\Http\Controllers\CarreraController::class, 'store']);

Route::put('carrera/{carrera}', [App\Http\Controllers\CarreraController::class, 'update']);

Route::delete('carrera/{carrera}', [App\Http\Controllers\CarreraController::class, 'destroy']);


// Routes Alumnos

Route::get('alumnos', [App\Http\Controllers\AlumnoController::class, 'index']);

Route::get('alumno/{alumno}', [App\Http\Controllers\AlumnoController::class, 'show']);

Route::post('alumno', [App\Http\Controllers\AlumnoController::class, 'store']);

Route::put('alumno/{alumno}', [App\Http\Controllers\AlumnoController::class, 'update']);

Route::delete('alumno/{alumno}', [App\Http\Controllers\AlumnoController::class, 'destroy']);

// Routes Materias

Route::get('materias', [App\Http\Controllers\MateriaController::class, 'index']);

Route::get('materia/{materia}', [App\Http\Controllers\MateriaController::class, 'show']);

Route::post('materia', [App\Http\Controllers\MateriaController::class, 'store']);

Route::put('materia/{materia}', [App\Http\Controllers\MateriaController::class, 'update']);

Route::delete('materia/{materia}', [App\Http\Controllers\MateriaController::class, 'destroy']);

// Routes Registro

Route::get('registros', [App\Http\Controllers\RegistroMateriaPorAlumnoController::class, 'index']);

Route::get('registro/{registro}', [App\Http\Controllers\RegistroMateriaPorAlumnoController::class, 'show']);

Route::post('registro', [App\Http\Controllers\RegistroMateriaPorAlumnoController::class, 'store']);