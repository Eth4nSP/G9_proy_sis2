<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos Subidos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <button class="btn btn-back" onclick="history.back()">ATRÁS</button>
<div class="container mt-5">
    <h1 class="text-center">Archivos subidos por el equipo {{ $nombreEquipo }}</h1>

    <div class="list-group">
        @forelse($proyectos as $proyecto)
            <div class="list-group-item">
                <h5>{{ $proyecto->titulo_proyecto }}</h5>
                <a href="{{ route('proyectos.descargarArchivo', ['archivo' => $proyecto->archivo_proyecto]) }}" class="btn btn-success">Descargar</a>
            </div>
        @empty
            <p>No se han subido archivos para este equipo.</p>
        @endforelse
    </div>

    <a href="{{ route('proyectos.verEquipos') }}" class="btn btn-primary mt-3">Volver a seleccionar otro equipo</a>
</div>

</body>
</html>
