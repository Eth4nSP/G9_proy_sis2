<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inicio_Sesion;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('login');
});

// routes/web.php

Route::get('/inscribirGrupo', function () {
    return view('inscribirGrupo');
});

Route::get('/listaGrupos', function () {
    return view('listaGrupos');
});

Route::get('/matricularse', function () {
    return view('matricularse');
});

Route::get('/main_est', function () {
    return view('main_est');
});

Route::get('/registro_est', function () {
    return view('registro_est');
});

Route::get('/docente_grupos', function () {
    return view('docente_grupos');
});

Route::get('/crear_grupos', function () {
    return view('crear_grupos');
});


Route::get('/home_estudiante', function () {
    return view('main_est');
});
Route::post('/login', [Inicio_Sesion::class, 'login']);




