<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB TIS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        header {
            background-color: #3367d6;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .logo-container a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }

        .menu, .user-icon {
            font-size: 18px;
            cursor: pointer;
            padding: 10px;
        }

        .dropdown {
            position: absolute;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: none;
            width: 200px;
            text-align: left;
        }

        .dropdown.active {
            display: block;
        }

        .dropdown a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
            border-bottom: 1px solid #eee;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            width: 40%;
        }

        .card button {
            background-color: #003399;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }
        
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuButton = document.querySelector('.menu');
            const userIcon = document.querySelector('.user-icon');
            const menuDropdown = document.getElementById('menu-dropdown');
            const userDropdown = document.getElementById('user-dropdown');

            function toggleDropdown(dropdown) {
                dropdown.classList.toggle('active');
            }

            menuButton.addEventListener('click', (event) => {
                event.stopPropagation();
                toggleDropdown(menuDropdown);
                userDropdown.classList.remove('active');
            });

            userIcon.addEventListener('click', (event) => {
                event.stopPropagation();
                toggleDropdown(userDropdown);
                menuDropdown.classList.remove('active');
            });

            document.addEventListener('click', () => {
                menuDropdown.classList.remove('active');
                userDropdown.classList.remove('active');
            });
        });

        document.addEventListener('DOMContentLoaded', async () => {
        const estudianteId = 1; // ID del estudiante (puede venir de sesión o de otro lado)
        const apiUrl = `http://127.0.0.1:8000/estudiante/obtenerDatos`; // Cambia según tu API

        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('No se pudo obtener los datos');

            const data = await response.json();
            //localStorage.setItem('id_grupo', data.id_grupo);
            // Insertar datos en el HTML
            document.getElementById('nombre-estudiante').innerText = `Bienvenido, ${data.nombre} ${data.apellido_paterno}`;
            document.getElementById('info-estudiante').innerText = `Gestión: ${data.gestion}, Grupo ${data.grupo}`;
        } catch (error) {
            console.error('Error:', error);
            document.getElementById('nombre-estudiante').innerText = 'Error al cargar datos';
        }
    });
    </script>
</head>
<body>
    
    
    <div class="container">
        <h2 id="nombre-estudiante">Bienvenido, Estudiante</h2>
        <p id="info-estudiante">Gestión: Desconocida, Grupo N/A</p>

        <div class="card">
            <h3>Equipo de proyecto</h3>
            <p>Fecha límite de entrega: 2024-12-12</p>
            <a href="registrar_equipo"><button>Registrar Equipo</button></a>
            <a href="actualizar_equipo"><button>Actualizar Equipo</button></a>
        </div>

        <div class="card">
            <h3>Evaluación</h3>
            <button disabled style="background-color: gray">Realizar Evaluación</button>
            <button disabled style="background-color: gray">Visualizar Evaluaciones</button>
        </div>

        <div class="card">
            <h3>Proyecto y Nota</h3>
            <button disabled style="background-color: gray">Lista de Estudiantes</button>
            <a href="subirProyecto"><button>Subir Proyecto</button></a>
        </div>
    </div>
</body>
</html>
