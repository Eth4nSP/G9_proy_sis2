<?php

namespace App\Http\Controllers;

class Estudiante extends Controller{

    public function obtenerDatos(){
        // Recuperar los datos de la sesión
    $estudiante = session('estudiante');

    // Si no hay datos en la sesión, devolver un error
    if (!$estudiante) {
        return response()->json(['error' => 'No hay datos en la sesión'], 401);
    }

    // Responder con los datos del estudiante
    return response()->json([
        'nombre' => $estudiante['nombre'],
        'apellido_paterno' => $estudiante['apellido_paterno'],
        'gestion' => '2025', // Cambia esto con el dato real
        'grupo' => '1', // Cambia esto con el dato real
        'id_grupo' => $estudiante['id_grupo'],
        'id_equipo' => $estudiante['id_equipo']
    ]);
    }

    public function isSessionActiveEstudiante()
    {
        if (session()->has('estudiante')) {
            return response()->json(['mensaje' => 'Sesión activa' , 'usuario' => session('estudiante')], 200);
        } else {
            return response()->json(['mensaje' => 'No hay sesión activa'], 401);
        }
        
    }
}