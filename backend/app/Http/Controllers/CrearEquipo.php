<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\EstudianteGrupo;
class CrearEquipo extends Controller{
    public function crearEquipo(Request $request)
    {
        $idEstudiante = session('estudiante.id');
        // Validación de los datos
        $request->validate([
            'nombre_equipo'   => 'required|string|max:255',
            //'estudiante'    => 'required|integer|exists:estudiante,idEstudiante',//Esta parte se tiene que recuperar de la session estudiante 
        ]);

        $estudiante = Estudiante::find($idEstudiante);
            if ($estudiante->equipos()->exists()) { 
                return response()->json([
                'message' => 'El estudiante ya está asociado a otro equipo'
            ], 400);
        }
    
        $equipo = Equipo::create([
            'nombre_equipo'    => $request->nombre_equipo,
            'publicada'      => '0'
        ]);

        $equipo->estudiantes()->attach($idEstudiante);
        
        return response()->json([
            'message' => 'Equipo creado con éxito',
            'equipo' => $equipo
        ], 201);
    }

    public function actualizarIntegrantes(Request $request)
    {   $idEquipo = session('estudiante.id_equipo');
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'integrantes' => 'required|array|max:5', // Máximo 5 integrantes
            'integrantes.*' => 'exists:estudiante,id_Estudiante'
        ]);
        $equipo = DB::table('equipo')->where('id_equipo', $idEquipo)->first();
        if (!$equipo) {
            return response()->json(['mensaje' => 'Empresa no encontrada'], 404);
        }
        if ($equipo->publicada == 1) {
            return response()->json(['mensaje' => 'No se puede modificar el equipo porque ya ha sido publicada'], 403);
        }

        // Actualizar los integrantes de la empresa
        DB::transaction(function () use ($idEquipo, $validatedData) {
            // Insertar los nuevos integrantes
            $nuevosIntegrantes = [];
            foreach ($validatedData['integrantes'] as $idEstudiante) {
                $nuevosIntegrantes[] = [
                    'id_equipo' => $idEquipo,
                    'id_Estudiante' => $idEstudiante
                ];
            }
            DB::table('estudiante_equipo')->insert($nuevosIntegrantes);
        
            // Actualizar el campo disponible a 0 para los estudiantes agregados
            DB::table('estudiante')
                ->whereIn('id_estudiante', $validatedData['integrantes'])
                ->update(['disponible' => 0]);
        });
        
        $equipo1 = Equipo::find($idEquipo); // Busca el estudiante
        $equipo1->publicada = 1;  // Cambia el campo
        $equipo1->save(); // Guarda los cambios

        return response()->json(['mensaje' => 'Integrantes actualizados correctamente']);
    }

    public function obtenerEstudiantesSinEquipo()
    {
        $idEstudiante = session('estudiante.id');
        // Obtener el grupo al que pertenece el estudiante proporcionado
        $grupo = EstudianteGrupo::where('id_estudiante', $idEstudiante)
            ->select('id_grupo')
            ->first();
    
        if (!$grupo) {
            return response()->json(['error' => 'El estudiante no pertenece a ningún grupo.'], 404);
        }
    
        // Obtener estudiantes que no están asociados a ninguna empresa y pertenecen al mismo grupo
        $estudiantes = DB::table('estudiante_grupo as ee')
        ->select('e.id_estudiante','e.nombre','e.apellido_paterno','e.apellido_materno')
            ->join('estudiante as e', 'ee.id_estudiante', '=', 'e.id_estudiante')
            ->join('grupo as g', 'g.id_grupo', '=', 'ee.id_grupo')
            ->where('g.id_grupo', 1)
            ->where('e.id_estudiante', '<>', 1)
            ->where('e.disponible','=','1')
            ->get();
             // Solo obtener los IDs
            
        return response()->json($estudiantes, 200);
    }
}