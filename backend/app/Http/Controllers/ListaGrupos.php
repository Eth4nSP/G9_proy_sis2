<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\EstudianteGrupo;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use App\Models\Grupo;

class ListaGrupos extends Controller
{
    
    

    public function show($id)
    {
        // Obtener el grupo por ID
        $grupo = Grupo::findOrFail($id);
    
        // Pasar el grupo a la vista
        return view('matricularse2', compact('grupo'));
    }
    


    public function gruposDisponibles(){
        $grupos = DB::table('grupo as g')
        ->select('g.id_grupo','d.nombre','d.apellido_paterno','d.apellido_materno')
            ->join('docente as d', 'g.id_docente', '=', 'd.id_docente')
            ->get();
             // Solo obtener los IDs
            
        return response()->json($grupos, 200);
    }
}