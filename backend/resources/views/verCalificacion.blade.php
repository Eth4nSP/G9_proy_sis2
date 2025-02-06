<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos Calificados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <button style='background-color: red'class="btn btn-back" onclick="history.back()">ATRÁS</button>
    <div class="container mt-5">
        <h1 class="text-center">Equipos Calificados</h1>
        <div id="equipos-list" class="row mt-4">
            <!-- Las cards con los equipos calificados se insertarán aquí -->
        </div>
    </div>

    <script>
        // Función para obtener los equipos calificados y mostrar los datos
        async function obtenerEquipos() {
            try {
                // Realiza la solicitud GET al controlador Laravel
                const response = await fetch('http://127.0.0.1:8000/verEquiposCalificados'); // Cambia esto a la ruta correcta
                const equipos = await response.json(); // Convierte la respuesta JSON

                // Selecciona el contenedor donde se mostrarán las cards
                const equiposList = document.getElementById('equipos-list');

                // Recorre cada equipo y crea una card con su información
                equipos.forEach(equipo => {
                    const card = `
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${equipo.nombre_equipo}</h5>
                                <p class="card-text">Proyecto: ${equipo.proyecto_nota}</p>
                                <p class="card-text"><strong>Nota:</strong> ${equipo.nota}</p>
                            </div>
                        </div>
                    </div>
                    `;
                    // Agrega la card al contenedor
                    equiposList.innerHTML += card;
                });
            } catch (error) {
                console.error('Error al obtener los equipos: ', error);
            }
        }

        // Llama a la función cuando la página cargue
        window.onload = obtenerEquipos;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
