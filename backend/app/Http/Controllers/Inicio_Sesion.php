<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;

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
                // Buscar el ID del grupo del estudiante (si existe)
                $idGrupo = DB::table('estudiante_grupo')
                    ->where('id_estudiante', $userE->id_estudiante)
                    ->value('id_grupo') ?? 0;

                // Buscar el ID del equipo del estudiante (si existe)
                $idEquipo = DB::table('estudiante_equipo')
                    ->where('id_estudiante', $userE->id_estudiante)
                    ->value('id_equipo') ?? 0;

                // Guardar en la sesión
                session()->put('estudiante', [
                    'id' => $userE->id_estudiante,
                    'nombre' => $userE->nombre,
                    'apellido_paterno' => $userE->apellido_paterno,
                    'apellido_materno' => $userE->apellido_materno,
                    'role' => 'estudiante',
                    'id_grupo' => $idGrupo,
                    'id_equipo' => $idEquipo,
                ]);
                return response()->json([
                    'mensaje' => 'Login exitoso estudiante',
                    'usuario' => session('estudiante'), // Esto accede a los datos almacenados en la sesión
                    'role' => 'estudiante',
                    'id_grupo' => $idGrupo ?? 0, // También lo pasamos directamente en la respuesta
                    'id_equipo' => $idEquipo ?? 0
                ]);
            } else {
                return response()->json(['error' => 'Credenciales incorrectas E'], 401);
            }
        } elseif ($userD) {
            if (trim($credentials['contrasena']) === trim($userD->contrasena)) {
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