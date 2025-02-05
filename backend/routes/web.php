<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inicio_Sesion;
use App\Http\Controllers\Estudiante;
use App\Http\Controllers\CrearEquipo;
use App\Http\Controllers\inscribir;
use App\Http\Controllers\ListaGrupos;
use App\Http\Controllers\ProyectoController;
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
//Redirecciones
Route::get('/', function () {
    return view('login');
});

Route::get('/home_estudiante', function () {
    return view('main_est');
});

Route::get('/home_docente', function () {
    return view('main_doc');
});

Route::get('/registrar_equipo', function () {
    return view('registrar_equipo');
});

Route::get('/actualizar_equipo', function () {
    return view('actualizar_equipo');
});

Route::get('/listaGrupos', function () {
    return view('listaGrupos');
});

// web.php
// web.php
Route::get('/matricularse2/{id}', [ListaGrupos::class, 'show'])->name('matricularse2');

Route::post('/estudiante/matricularse',[Inscribir::class, 'inscribirEstudiante']);




Route::get('/subirProyecto', function () {
    return view('subirProyecto');
});


Route::post('/proyecto/upload', [ProyectoController::class, 'subirProyecto'])->name('subirProyecto');




//Consultas
Route::post('/login', [Inicio_Sesion::class, 'login']);

Route::get('/estudiante/obtenerDatos',[Estudiante::class, 'obtenerDatos']);

Route::get('/estudiante/sesion',[Estudiante::class, 'isSessionActiveEstudiante']);

Route::post('/estudiante/crearEquipo',[CrearEquipo::class, 'crearEquipo']);


Route::get('/estudiante/obtenerEstudiantesSinEquipo',[CrearEquipo::class, 'obtenerEstudiantesSinEquipo']);

Route::post('/estudiante/actualizarIntegrantes',[CrearEquipo::class, 'actualizarIntegrantes']);

Route::get('/estudiante/gruposDisponibles',[ListaGrupos::class, 'gruposDisponibles']);

Route::get('/obtenerGrupo/{id}', [ListaGrupos::class, 'show']);

// web.php
Route::get('/matricularse', [ListaGrupos::class, 'show'])->name('matricularse');


Route::get('/seleccionarEquipo1', function () {
    return view('seleccionarEquipo');
});
Route::get('ver-equipos', [ProyectoController::class, 'verEquipos'])->name('ver.equipos');
Route::get('ver-archivos/{nombreEquipo}', [ProyectoController::class, 'verArchivos'])->name('ver.archivos');
Route::get('descargar-archivo/{archivo}', [ProyectoController::class, 'descargarArchivo'])->name('descargar.archivo');
Route::get('descargar-archivos/{nombreEquipo}', [ProyectoController::class, 'descargarArchivosDeEquipo'])->name('descargar.archivos');
