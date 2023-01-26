<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\ApiNombresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [EstudiantesController::class, 'index']);
Route::get('/agregar-estudiante', [EstudiantesController::class, 'vistaCrearEstudiantes'])->name('vistaCrearEstudiantes');
Route::post('/crear-estudiante', [EstudiantesController::class, 'crearEstudiantes']);
Route::get('/informacion-estudiante/{idEstudiante?}', [EstudiantesController::class, 'informacionEstudiante'])->name('fichaEstudiante');
Route::post('/asignar-materia-estudiante', [EstudiantesController::class, 'asignarMateriaEstudiante'])->name('materiaEstudiante');
Route::post('/calificar-materia-estudiante', [EstudiantesController::class, 'notaMateriaEstudiante'])->name('calificarMateriaEstudiante');
Route::get('/ver-materias', [MateriasController::class, 'index']);
Route::get('/ver-cursos', [CursosController::class, 'index']);

Route::get('/vista-api', [ApiNombresController::class, 'vistaGet']);
