<?php

namespace App\Http\Controllers;

use App\Models\EstudianteGrupo;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;

class inscribir extends Controller
{
    public function inscribirEstudiante(Request $request)
    {
        $idEstudiante = session('estudiante.id');
        
        // Validación de los datos de entrada
        $request->validate([
            'codigo'   => 'required',
            'id_grupo' => 'required',
            'id' => 'required'
        ]);
        
        // Obtener el código de acceso y el ID del grupo desde la solicitud
        $codigo = $request->codigo;
        $id_grupo = $request->id_grupo;
        $id = $request->id;
    
        // Realizar la consulta para obtener el grupo con el código y el ID
        $grupo = DB::table('grupo') // Asegúrate de que el nombre de la tabla sea correcto
                    ->where('codigo', $codigo)
                    ->where('id_grupo', $id_grupo) // Asegúrate de que el campo en la tabla sea correcto
                    ->first(); // Obtener el primer resultado
    
        // Verificar si se encontró el grupo
        if ($grupo) {
            // Verificar si el estudiante ya está inscrito en el grupo
            // Registrar la inscripción del estudiante
            $estudiantesGrupo = new estudiantegrupo();
            $estudiantesGrupo->id_Estudiante = $id;
            $estudiantesGrupo->id_Grupo = $request->id_grupo;
            $estudiantesGrupo->save();
    
            return response()->json(['success' => true, 'grupo' => $grupo]);
        } else {
            return response()->json(['success' => false, 'message' => 'Código de acceso inválido']);
        }
    }
}