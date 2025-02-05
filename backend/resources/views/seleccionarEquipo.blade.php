<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Equipo</title>
    <style>
        /* Estilos básicos */
        .equipos-lista {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .equipo-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }
        .button {
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <!-- Contenido de tu header aquí -->
    </header>
    
    <div class="container">
        <h2>Selecciona un equipo</h2>
        
        <!-- Contenedor donde se mostrarán los equipos -->
        <div class="equipos-lista" id="equipos-lista"></div>
    </div>

    <script>
        // Función para obtener y mostrar los equipos
        document.addEventListener('DOMContentLoaded', () => {
            fetch('http://127.0.0.1:8000/ver-equipos')
                .then(response => response.json())
                .then(data => {
                    const equiposLista = document.getElementById('equipos-lista');

                    data.forEach(equipo => {
                        // Crear un contenedor para cada equipo
                        const equipoCard = document.createElement('div');
                        equipoCard.classList.add('equipo-card');
                        
                        // Crear el contenido de la tarjeta
                        const equipoNombre = document.createElement('h3');
                        equipoNombre.textContent = equipo.nombre_equipo;
                        
                        const equipoDescripcion = document.createElement('p');
                        equipoDescripcion.textContent = `id: ${equipo.id_equipo}`;

                        // Botón para ver archivos y descargar el ZIP
                        const verArchivosBtn = document.createElement('a');
                        verArchivosBtn.href = `/descargar-archivos/${equipo.nombre_equipo}`; // Apunta a la ruta de descarga del ZIP
                        const button = document.createElement('button');
                        button.classList.add('button');
                        button.textContent = 'Descargar Archivos'; // Cambié el texto a "Descargar Archivos"
                        verArchivosBtn.appendChild(button);
                        
                        // Agregar el contenido a la tarjeta
                        equipoCard.appendChild(equipoNombre);
                        equipoCard.appendChild(equipoDescripcion);
                        equipoCard.appendChild(verArchivosBtn);

                        // Agregar la tarjeta a la lista
                        equiposLista.appendChild(equipoCard);
                    });
                })
                .catch(error => {
                    console.error('Error al cargar los equipos:', error);
                });
        });
    </script>
</body>
</html>
