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
            position: relative;
        }
        .logo-container, .user-container {
            position: relative;
            display: inline-block;
        }

        .Logo{
            color: white;
            display: flex;
            position: relative;
            left: -585px;
            top: 1px;
            text-decoration: none;
            font-weight:550 ;
        }

        .menu-container, .user-container {
            position: relative;
            display: inline-block;
        }

        .menu, .user-icon {
            font-size: 18px;
            cursor: pointer;
            padding: 10px;
            position: relative;
        }

        .dropdown {
            position: absolute;
            top: 40px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: none;
            width: 200px;
            z-index: 1000;
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
            font-size: 16px;
        }

        .dropdown a:last-child {
            border-bottom: none;
        }

        .dropdown a:hover {
            background-color: #f2f2f2;
        }

        #menu-dropdown {
            left: 0;
        }

        #user-dropdown {
            right: 0;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        .button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            text-decoration: none;
            color: white;
            background-color: blue;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button-SS{
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 95px;
            text-decoration: none;
            color: white;
            background-color: blue;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button.disabled {
            background-color: grey;
            cursor: not-allowed;
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
    </script>
</head>
<body>
    <header>       
        <div class="menu-container">
            <div class="menu">&#9776;</div>            
            <div id="menu-dropdown" class="dropdown">
                <a href="#">Equipos</a>
                <a href="#">Calificaciones</a>
            </div>
        </div>
        <div class="logo-container">
            <a class="Logo" href="main_doc"> WEB GEST</a>
        </div>
        <div class="user-container">
            <div class="user-icon">&#128100;</div>
            <div id="user-dropdown" class="dropdown">
                <a href="#">Profile</a>
                <a href="login">Cerrar sesión</a>
            </div>
        </div>
    </header>
    
    <div class="container">
        <h2>Bienvenid@, Ing. Pedro Juliano Coca</h2>
        <h3>Gestión 2025-02, Grupo 1</h3>
        <div class="grid">
            <div class="card">
                <h4>Resumen General</h4>
                <p>📚 Estudiantes inscritos: <strong>35</strong></p>
                <p>👥 Grupos de Trabajo: <strong>7</strong></p>
                <button class="button">Lista de Estudiantes</button>
                <button class="button disabled">Lista de equipos</button>
            </div>
            <div class="card">
                <h4>Evaluaciones</h4>
                <button class="button">Enviar Evaluaciones</button>
            </div>
            <div class="card">
                <h4>Datos del proyecto</h4>
                <!-- Enlace a la vista de selección de equipo -->
                <a href="seleccionarEquipo1"><button class="button">Archivos enviados por los grupos</button></a>
                <button class="button disabled">Calificar</button>
            </div>
        </div>
    </div>
</body>
</html>
