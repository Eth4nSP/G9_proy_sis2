<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricularse con el Docente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2c56b8;
            color: white;
            padding: 10px 20px;
        }
        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .boton-atras {
            background-color: rgb(255, 0, 0);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .description {
            margin-bottom: 20px;
        }
        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .form input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }
        .form button {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .form button:hover {
            background-color: #333;
        }
        .message {
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <header>
        <div class="menu">&#9776; WEB TIS</div>
        <div class="user-icon">&#128100;</div>
    </header>

    <div class="content">
        <button class="boton-atras" style="position: absolute;top: 50%;" onclick="history.back()">Atrás</button>
        <h1>MATRICULARSE CON UN DOCENTE</h1>

        <div class="description">
            <strong>Nombre del Grupo: {{ $grupo->numero_grupo }}</strong>
            <p>Descripción: {{ $grupo->descripcion }}</p>
        </div>

        <form class="form" id="matricular-form">
            <label for="codigo">Código de acceso:</label>
            <input type="text" id="codigo" name="codigo" placeholder="CÓDIGO">
            <button type="submit">MATRICULARSE</button>
        </form>

        <div class="message" id="message"></div>
    </div>

    <script>
        // Obtener el ID del grupo desde la variable de Blade
        const idGrupo = "{{ $grupo->id_grupo }}";  // Este valor se pasa desde Blade

        // Función para enviar el código de acceso
        document.getElementById('matricular-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el comportamiento por defecto del formulario

            const codigo = document.getElementById('codigo').value;
            if (!codigo) {
                alert( "Por favor ingresa el código de acceso.");
                return;
            }

            // Enviar el código y el id_grupo mediante fetch
            fetch('http://127.0.0.1:8000/estudiante/matricularse', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF de Laravel
                },
                body: JSON.stringify({ codigo: codigo, id_grupo: idGrupo })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('message').textContent = "¡Matriculación exitosa!";
                    document.getElementById('message').style.color = 'green';
                    // Actualizar directamente el valor de id_grupo en localStorage
                    localStorage.setItem('id_grupo', idGrupo);  // Cambia '67890' por el nuevo valor

                    window.location.href = '/home_estudiante'
                } else {
                    document.getElementById('message').textContent = "Hubo un error con la matriculación.";
                    document.getElementById('message').style.color = 'red';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('message').textContent = "Error al enviar la solicitud.";
                document.getElementById('message').style.color = 'red';
            });
        });
    </script>
</body>
</html>
