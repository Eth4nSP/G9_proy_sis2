<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Storage;
use App\Models\Equipo;
use ZipArchive;
use Illuminate\Support\Facades\File;


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

        // Obtener los datos del formulario
        $nombreEquipo = $request->nombre_equipo;
        $titulo = $request->titulo;
        $integrantes = $request->integrantes;

        // Obtener el archivo y generar el nombre con el título y la fecha
        $archivo = $request->file('proyecto');
        $nombreArchivo = $titulo . '_' . now()->format('YmdHis') . '.pdf';

        // Crear una carpeta para el equipo en la carpeta 'public/proyectos'
        $rutaCarpeta = 'public/proyectos/' . $nombreEquipo;

        // Asegurarse de que la carpeta exista
        Storage::makeDirectory($rutaCarpeta);

        // Guardar el archivo en la carpeta del equipo
        $rutaArchivo = $archivo->storeAs($rutaCarpeta, $nombreArchivo);

        // Crear el registro en la base de datos
        Proyecto::create([
            'titulo_proyecto' => $titulo,
            'archivo_proyecto' => $rutaArchivo, // Ruta del archivo guardado
        ]);

        // Responder con éxito
        return response()->json(['success' => true]);
    }

    // Método para mostrar la vista con el listado de equipos
    public function verEquipos()
    {
        // Obtener todos los equipos
        $equipos = Equipo::all();  // Asegúrate de tener un modelo Equipo
    
        return response()->json($equipos);
    }
    

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
