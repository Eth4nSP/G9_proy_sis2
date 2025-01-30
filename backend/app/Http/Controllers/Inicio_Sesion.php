<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;

class Inicio_Sesion extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('nombreCuenta', 'contrasena');
        $userE = Estudiante::whereRaw('BINARY nombreCuenta = ?', [$credentials['nombreCuenta']])->first();
        $userD = Docente::whereRaw('BINARY nombreCuenta = ?', [$credentials['nombreCuenta']])->first();
        if ($userE) {
            if (Hash::check($credentials['contrasena'], $userE->contrasena)) {
                // Almacenamos los datos del estudiante en la sesión manualmente
                session()->put('estudiante', [
                    'id' => $userE->idEstudiante,
                    'nombre' => $userE->nombreEstudiante,
                    'primerApellido' => $userE->primerApellido,
                    'segundoApellido' => $userE->segundoApellido,
                    'role' => 'estudiante'
                ]);
                return response()->json([
                    'mensaje' => 'Login exitoso',
                    'usuario' => session('estudiante'), // Esto accede a los datos almacenados en la sesión
                    'role' => 'estudiante'
                ]);
            } else {
                return response()->json(['error' => 'Credenciales incorrectas E'], 401);
            }
        } elseif ($userD) {
            if (Hash::check($credentials['contrasena'], $userD->contrasena)) {
                // Autenticación exitosa para docente
                session()->put('docente', [
                    'id' => $userD->idDocente,
                    'nombre' => $userD->nombreDocente,
                    'primerApellido' => $userD->primerApellido,
                    'segundoApellido' => $userD->segundoApellido,
                    'role' => 'docente',
                    'gestionGrupo' => ''
                ]);

                return response()->json([
                    'mensaje' => 'Login exitoso',
                    'usuario' => session('docente'),
                    'role' => 'docente'
                ]);
            }else{
                return response()->json(['error' => 'Credenciales incorrectas D'], 401);
            }
        
        }
        else{
                return response()->json(['error' => 'Usuario no encontrado'], 401);
            }

    }
}