<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Storage;
use App\Models\Equipo;
use ZipArchive;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class ProyectoController extends Controller
{
    public function subirProyecto(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'integrantes' => 'required|string|max:500',
            'proyecto' => 'required|mimes:pdf|max:10240', // PDF y hasta 10 MB
        ]);
    
        // Obtener el equipo desde la sesión
        $equipo = session('estudiante.id_equipo');
    
        // Validar si el equipo existe
        if (!$equipo) {
            return response()->json([
                'success' => false,
                'message' => 'El nombre del equipo es incorrecto o no existe.'
            ], 422);
        }
    
        // Obtener el nombre del equipo
        $nombreEquipo = DB::table('equipo')
            ->where('id_equipo', $equipo)
            ->value('nombre_equipo'); // Obtiene directamente el nombre del equipo
    
        if (!$nombreEquipo) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontró el equipo en la base de datos.'
            ], 404);
        }
    
        // Obtener los datos del formulario
        $titulo = $request->titulo;
    
        // Obtener el archivo y generar el nombre con el título y la fecha
        $archivo = $request->file('proyecto');
        $nombreArchivo = $titulo . '_' . now()->format('YmdHis') . '.pdf';
    
        // Crear una carpeta para el equipo en 'public/proyectos'
        $rutaCarpeta = 'proyectos/' . $nombreEquipo; // Sin 'public/', Laravel maneja eso automáticamente
        Storage::disk('public')->makeDirectory($rutaCarpeta);
    
        // Guardar el archivo en la carpeta del equipo
        $rutaArchivo = $archivo->storeAs($rutaCarpeta, $nombreArchivo, 'public');
    
        // Crear el registro del proyecto en la base de datos
        $proyecto = Proyecto::create([
            'titulo_proyecto' => $titulo,
            'archivo_proyecto' => $rutaArchivo, // Ruta del archivo guardado
        ]);
    
        // Verificar si el equipo ya tiene un registro en `proyecto_equipo`
        $proyectoEquipo = DB::table('proyecto_equipo')
            ->where('id_equipo', $equipo)
            ->first();
    
        if ($proyectoEquipo) {
            // Si ya tiene un registro, actualizar el id_proyecto
            DB::table('proyecto_equipo')
                ->where('id_equipo', $equipo)
                ->update(['id_proyecto' => $proyecto->id_proyecto]);
        } else {
            // Si no tiene un registro, insertar uno nuevo
            DB::table('proyecto_equipo')->insert([
                'id_proyecto' => $proyecto->id_proyecto,
                'id_equipo' => $equipo,
            ]);
        }
    
        // Responder con éxito
        return response()->json(['success' => true]);
    }

    // Método para mostrar la vista con el listado de equipos
    public function verEquipos()
    {
     // Obtener todos los equipos y agrupar por nombre_equipo
$equipos = DB::table('equipo as e')
->join('estudiante_equipo as ep', 'ep.id_equipo', '=', 'e.id_equipo')
->join('estudiante as es', 'ep.id_estudiante', '=', 'es.id_estudiante')
->join('estudiante_grupo as eg', 'eg.id_estudiante', '=', 'es.id_estudiante')
->join('grupo as g', 'g.id_grupo', '=', 'eg.id_grupo')
->where('g.id_docente', session('docente.id'))
->groupBy('e.id_equipo', 'e.nombre_equipo') // Agrupar por el id y nombre del equipo
->select('e.id_equipo', 'e.nombre_equipo', DB::raw('COUNT(es.id_estudiante) as total_estudiantes'))
->get();


    
        return response()->json($equipos);
    }

    public function verEquiposCalificados(){

// Obtener todos los equipos y agrupar por nombre_equipo
$equipos = DB::table('equipo as e')
    ->join('estudiante_equipo as ep', 'ep.id_equipo', '=', 'e.id_equipo')
    ->join('estudiante as es', 'ep.id_estudiante', '=', 'es.id_estudiante')
    ->join('estudiante_grupo as eg', 'eg.id_estudiante', '=', 'es.id_estudiante')
    ->join('grupo as g', 'g.id_grupo', '=', 'eg.id_grupo')
    ->join('proyecto_equipo as pe', 'e.id_equipo', '=', 'pe.id_equipo')
    ->where('g.id_docente', session('docente.id'))
    ->groupBy('e.nombre_equipo')
    ->select('e.nombre_equipo', DB::raw('MAX(pe.nota) as nota'), DB::raw('AVG(pe.nota) as promedio_nota'))  // Seleccionando las notas promedio por equipo
    ->get();

    
        
            return response()->json($equipos);
        
    }

    /*public function obtenerNota($id_equipo)
    {
        $nota = DB::table('proyecto_equipo')
            ->where('id_equipo', $id_equipo)
            ->value('nota'); // Asegúrate de que 'nota' sea una columna en tu tabla

        return response()->json(['nota' => $nota]);
    }*/
    

    // Método para mostrar los archivos de un equipo específico
    public function verArchivos($nombreEquipo)
    {
        // Obtener los proyectos de un equipo específico
        $proyectos = Proyecto::where('nombre_equipo', $nombreEquipo)->get();

        // Pasar los proyectos a la vista
        return view('proyectos.verArchivos', compact('proyectos', 'nombreEquipo'));
    }

    // Método para descargar un archivo
    public function descargarArchivosDeEquipo($nombreEquipo)
{
    // Ruta del directorio donde están los archivos del equipo
    $directorio = storage_path('app/public/proyectos/' . $nombreEquipo); // Asegúrate de que esta ruta sea correcta para tus archivos
    
    // Verificar si el directorio existe
    if (!File::exists($directorio)) {
        return response()->json(['error' => 'Directorio no encontrado.'], 404);
    }

    // Nombre del archivo ZIP
    $zipFileName = $nombreEquipo . '_archivos.zip';
    $zipFilePath = storage_path('app/public/' . $zipFileName);
    
    // Crear un archivo ZIP
    $zip = new ZipArchive();
    if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
        // Agregar todos los archivos del directorio al ZIP
        $files = File::allFiles($directorio);
        foreach ($files as $file) {
            $zip->addFile($file->getRealPath(), $file->getRelativePathname());
        }
        
        // Cerrar el archivo ZIP
        $zip->close();
        
        // Verificar si el archivo ZIP se ha creado correctamente
        if (file_exists($zipFilePath)) {
            return response()->download($zipFilePath)->deleteFileAfterSend(true); // Borra el archivo después de la descarga
        }
    }

    return response()->json(['error' => 'No se pudo crear el archivo ZIP.'], 500);
}
}
