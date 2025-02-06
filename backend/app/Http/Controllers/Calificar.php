<?php

namespace App\Http\Controllers;

use App\Models\EstudianteGrupo;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use App\Models\Equipo;
use App\Models\Proyecto;
use App\Models\ProyectoEquipo;
class Calificar extends Controller
{
    public function calificarEquipo(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'id_equipo' => 'required|integer|exists:equipo,id_equipo',
            'nota' => 'required|integer|min:0|max:100'
        ]);
    
        // Buscar el proyecto asociado al equipo en la tabla proyecto_equipo
        $proyectoEquipo = DB::table('proyecto_equipo')
            ->where('id_equipo', $request->id_equipo)
            ->first(); // Obtener el primer proyecto asignado a ese equipo
    
        // Validar si el equipo tiene un proyecto asociado
        if (!$proyectoEquipo) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró un proyecto asociado a este equipo.'
            ], 404);
        }
    
        // Actualizar la nota en la tabla proyecto_equipo
        DB::table('proyecto_equipo')
            ->where('id_proyecto', $proyectoEquipo->id_proyecto)
            ->where('id_equipo', $request->id_equipo)
            ->update(['nota' => $request->nota]);
    
        return response()->json(['mensaje' => 'Calificación guardada con éxito'], 200);
    }
    
}