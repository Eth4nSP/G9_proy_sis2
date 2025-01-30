<?php
namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Docente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Registro extends Controller{

    public function crearEstudiante(Request $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'nombreCuenta' => 'required|string',
                'nombreEstudiante' => 'required|string',
                'primerApellido' => 'required|string',
                'segundoApellido' => 'required|string',
                'contrasena' => 'required|string',
                //'contrasenaRepetida' => 'required|string',
                'email' => 'required|string',
            ]);
            if (DB::table('estudiante')->where('nombre_cuenta', $validated['nombreCuenta'])->exists()) {
                return response()->json(['error' => 'El nombre de cuenta ya existe.'], 400);
            }
            if (DB::table('estudiante')->where('correo', $validated['email'])->exists()) {
                return response()->json(['error' => 'El correo electrónico ya está registrado.'], 400);
            }
            /*if($validated['contrasena'] !== $validated['contrasenaRepetida']){
                return response()->json(['error' => 'La contraseña no es igual.'], 400);
            }*/
            DB::table('estudiante')->insert([
                'nombre_cuenta' => $validated['nombreCuenta'],
                'nombre' => $validated['nombreEstudiante'],
                'apellido_paterno' => $validated['primerApellido'],
                'apellido_materno' => $validated['segundoApellido'],
                'contrasena' => $validated['contrasena'], 
                'correo' => $validated['email'],
            ]);
            DB::commit();
            return response()->json(['message' => 'Estudiante registrado exitosamente.'], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Ocurrió un error al registrar el estudiante.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function crearDocente(Request $request) {
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'nombreCuenta' => 'required|string',
                'nombre' => 'required|string',
                'apellidoPaterno' => 'required|string',
                'apellidoMaterno' => 'required|string',
                'contrasena' => 'required|string',
                'repetirContrasena' => 'required|string',
                'correo' => 'required|string|email',
            ]);
            if (DB::table('docente')->where('nombreCuenta', $validated['nombreCuenta'])->exists()) {
                return response()->json(['error' => 'El nombre de cuenta ya existe.'], 400);
            }
            if (DB::table('docente')->where('email', $validated['correo'])->exists()) {
                return response()->json(['error' => 'El correo electrónico ya está registrado.'], 400);
            }
            if ($validated['contrasena'] !== $validated['repetirContrasena']) {
                return response()->json(['error' => 'La contraseña no es igual.'], 400);
            }
            DB::table('docente')->insert([
                'nombreCuenta' => $validated['nombreCuenta'],
                'nombreDocente' => $validated['nombre'],
                'primerApellido' => $validated['apellidoPaterno'],
                'segundoApellido' => $validated['apellidoMaterno'],
                'contrasena' => Hash::make($validated['contrasena']),
                'email' => $validated['correo'],
            ]);
    
            DB::commit();
            return response()->json(['message' => 'Docente registrado exitosamente.'],200);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Ocurrió un error al registrar el docente.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function obtenerDatosEstudiante(){
        $idEstudiante = session('estudiante.id');
        $estudiante = Estudiante::find($idEstudiante);
        $datosEstudiante = [
            'nombreCuenta' => $estudiante->nombreCuenta,
            'nombre' => $estudiante->nombreEstudiante,
            'apellido' => $estudiante->primerApellido,
            'segundoApellido' => $estudiante->segundoApellido,
            'correo' => $estudiante->email,
        ];
        return response()->json($datosEstudiante, 200);
    }
    public function obtenerDatosDocente(){
        $idDocente = session('docente.id'); 
        $docente = Docente::find($idDocente);
        $datosDocente = [
            'nombreCuenta' => $docente->nombreCuenta,
            'correo' => $docente->email,
            'nombre' => $docente->nombreDocente,
            'apellido' => $docente->primerApellido,
            'segundoApellido' => $docente->segundoApellido,
        ];
        return response()->json($datosDocente, 200);
    }
}
