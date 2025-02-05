<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Proyecto</title>
    <style>
        /* Estilos simples para el formulario */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #2c56b8;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1e449d;
        }
        .message {
            margin-top: 20px;
            color: green;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Subir Proyecto</h1>

        <!-- Formulario para enviar los datos del proyecto -->
        <div class="form-group">
            <label for="nombre_equipo">Nombre del Equipo:</label>
            <input type="text" id="nombre_equipo" name="nombre_equipo" required>
        </div>

        <div class="form-group">
            <label for="titulo">Título del Proyecto:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>

        <div class="form-group">
            <label for="integrantes">Integrantes del Proyecto:</label>
            <input type="text" id="integrantes" name="integrantes" required>
        </div>

        <div class="form-group">
            <label for="proyecto">Subir Proyecto (PDF):</label>
            <input type="file" id="proyecto" name="proyecto" accept=".pdf" required>
        </div>

        <button id="submit-btn">Subir Proyecto</button>

        <div class="message" id="message"></div>
    </div>

    <script>
        document.getElementById('submit-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado del botón

            const nombreEquipo = document.getElementById('nombre_equipo').value;
            const titulo = document.getElementById('titulo').value;
            const integrantes = document.getElementById('integrantes').value;
            const proyecto = document.getElementById('proyecto').files[0];

            // Validar que se han ingresado todos los datos
            if (!nombreEquipo || !titulo || !integrantes || !proyecto) {
                alert('Por favor, complete todos los campos.');
                return;
            }

            // Crear un FormData para enviar el archivo y los datos
            const formData = new FormData();
            formData.append('nombre_equipo', nombreEquipo);
            formData.append('titulo', titulo);
            formData.append('integrantes', integrantes);
            formData.append('proyecto', proyecto);

            // Realizar la solicitud AJAX utilizando fetch
            fetch('http://127.0.0.1:8000/proyecto/upload', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Asegúrate de pasar el CSRF token si estás en Laravel
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('message').textContent = '¡Proyecto subido exitosamente!';
                    document.getElementById('message').style.color = 'green';
                } else {
                    document.getElementById('message').textContent = 'Hubo un error al subir el proyecto.';
                    document.getElementById('message').style.color = 'red';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('message').textContent = 'Error al procesar la solicitud.';
                document.getElementById('message').style.color = 'red';
            });
        });
    </script>
</body>
</html>
