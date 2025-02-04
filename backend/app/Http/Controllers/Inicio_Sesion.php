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
        $credentials = $request->only('nombre_cuenta', 'contrasena');
        $userE = Estudiante::whereRaw('BINARY nombre_cuenta = ?', [$credentials['nombre_cuenta']])->first();
        $userD = Docente::whereRaw('BINARY nombre_cuenta = ?', [$credentials['nombre_cuenta']])->first();
        if ($userE) {
            if (trim($credentials['contrasena']) === trim($userE->contrasena)) {
                // Almacenamos los datos del estudiante en la sesión manualmente
                session()->put('estudiante', [
                    'id' => $userE->idEstudiante,
                    'nombre' => $userE->nombre,
                    'primerApellido' => $userE->apellido_paterno,
                    'segundoApellido' => $userE->apellido_materno,
                    'role' => 'estudiante'
                ]);
                return response()->json([
                    'mensaje' => 'Login exitoso estudiante',
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
                    'id' => $userD->id_docente,
                    'nombre' => $userD->nombre,
                    'primerApellido' => $userD->apellido_paterno,
                    'segundoApellido' => $userD->apellido_materno,
                    'role' => 'docente',
                    'gestionGrupo' => ''
                ]);

                return response()->json([
                    'mensaje' => 'Login exitoso docente',
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