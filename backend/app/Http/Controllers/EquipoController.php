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
class EquipoController extends Controller
{
    public function listaEstudiante(){
        // Obtener los estudiantes y su información relacionada con el grupo y equipo
        $estudiantes = DB::table('estudiante as e')
        ->join('estudiante_grupo as eg', 'eg.id_estudiante', '=', 'e.id_estudiante')
        ->join('grupo as g', 'g.id_grupo', '=', 'eg.id_grupo')
        ->join('estudiante_equipo as ee', 'ee.id_estudiante', '=', 'e.id_estudiante')
        ->join('equipo as eq', 'eq.id_equipo', '=', 'ee.id_equipo')
        ->where('g.id_docente', 1) // Filtra por el docente
        ->select('e.nombre', 'e.apellido_paterno', 'eq.nombre_equipo') // Selecciona los campos deseados
        ->get();
        return response()->json($estudiantes);
    }

    public function listaEquipos() {
        // Obtener los estudiantes y su información relacionada con el grupo y equipo
        $estudiantes = DB::table('estudiante as e')
            ->join('estudiante_grupo as eg', 'eg.id_estudiante', '=', 'e.id_estudiante')
            ->join('grupo as g', 'g.id_grupo', '=', 'eg.id_grupo')
            ->join('estudiante_equipo as ee', 'ee.id_estudiante', '=', 'e.id_estudiante')
            ->join('equipo as eq', 'eq.id_equipo', '=', 'ee.id_equipo')
            ->where('g.id_docente', session('docente.id')) // Filtra por el docente
            ->select('eq.nombre_equipo') // Selecciona el nombre del equipo
            ->groupBy('eq.nombre_equipo') // Agrupa por el nombre del equipo
            ->get();
    
        return response()->json($estudiantes);
    }
    
    
}