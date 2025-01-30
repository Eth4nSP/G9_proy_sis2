<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricularse con un Docente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #003da5;
            color: white;
            position: relative;
        }
        
        .menu {
            cursor: pointer;
            font-weight: bold;
            position: relative;
        }
        
        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 4px;
            z-index: 100;
        }
        
        .user-icon {
            position: relative;
            cursor: pointer;
        }
        
        .user-icon .dropdown {
            right: 0;
            left: auto;
        }
        
        .dropdown.active {
            display: block;
        }
        
        .dropdown a {
            display: block;
            padding: 5px 10px;
            text-decoration: none;
            color: black;
        }
        
        .dropdown a:hover {
            background-color: #f0f0f0;
        }
        
        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .content .description {
            margin-bottom: 20px;
        }
        
        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
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

    </style>
</head>

<body>
    <header>
        <div class="menu">&#9776; WEB TIS</div>
        <div id="menu-dropdown" class="dropdown">
            <a href="#">Visualizar Planificaciones</a>
            <a href="#">Lista de tareas Semanal</a>
            <a href="#">Grupo-Empresas</a>
            <a href="#">Calificaciones</a>
        </div>
        <div class="user-icon">&#128100;
            <div id="user-dropdown" class="dropdown">
                <a href="#">Profile</a>
                <a href="#">Cerrar sesión</a>
            </div>
        </div>
    </header>
    <div class="content">
        <button onclick="history.back()">Atrás</button>
        <h1>MATRICULARSE CON UN DOCENTE</h1>
        <div class="description">
            <strong>Blanco Coca Leticia G1</strong>
            <p>Descripción de Leticia desde la base</p>
        </div>
        <form class="form">
            <label for="codigo">Código de acceso:</label>
            <input type="text" id="codigo" placeholder="CÓDIGO">
            <button type="button">MATRICULARSE</button>
        </form>
    </div>
    <script>
        function toggleMenuDropdown() {
            const menuDropdown = document.getElementById('menu-dropdown');
            menuDropdown.classList.toggle('active');
        }

        function toggleUserDropdown() {
            const userDropdown = document.getElementById('user-dropdown');
            userDropdown.classList.toggle('active');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const menuIcon = document.querySelector('.menu');
            const userIcon = document.querySelector('.user-icon');

            menuIcon.addEventListener('click', toggleMenuDropdown);
            userIcon.addEventListener('click', toggleUserDropdown);
        });
    </script>
</body>

</html>