<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Lista de Tareas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 700px;
            margin: auto;
            border: 2px solid rgb(223, 223, 223);
            padding: 20px;
        }
        .btn {
            padding: 10px;
            border: none;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-back {
            background-color: red;
        }
        .btn-primary {
            background-color: blue;
        }
        .input-field1 {
            padding: 5px;
            margin-bottom: 10px;
            width: 370px;
        }
        .team-member {
            background-color: lightgray;
            padding: 10px;
            font-weight: bold;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <button class="btn btn-back" onclick="history.back()">ATRÁS</button>

    <div class="container">
        <h2>REGISTRAR EQUIPO</h2>
        <form id="equipoForm">
            @csrf
            <label><b>Nombre de equipo:</b></label>
            <input id="nombre" type="text" class="input-field1" placeholder="Nombre equipo"><br>
            <h3>Integrantes:</h3>
            <div class="team-member">Mario Juanito Alcachofa</div>
            <br>
            <button type="submit" class="btn btn-primary">CREAR</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('equipoForm').addEventListener('submit', async (event) => {
                event.preventDefault();

                const nombreEquipo = document.getElementById('nombre').value;
                if (!nombreEquipo.trim()) {
                    alert('Por favor, ingresa un nombre de equipo.');
                    return;
                }

                try {
                    const response = await fetch("http://127.0.0.1:8000/estudiante/crearEquipo", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ nombre_equipo: nombreEquipo })
                    });

                    const data = await response.json();

                    if (response.ok) {
                        alert('Equipo registrado correctamente.');
                        document.getElementById('nombre').value = '';
                    } else {
                        alert('Error: ' + data.message);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Ocurrió un error al registrar el equipo.');
                }
            });
        });
    </script>

</body>
</html>
