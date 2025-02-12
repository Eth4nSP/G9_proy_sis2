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
        }

        header {
            background-color: #3367d6;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .logo-container, .user-container {
            position: relative;
            display: inline-block;
        }

        .Logo{
            color: white;
            display: flex;
            position: relative;
            left: -584px;
            top:1px;
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

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .content {
            max-width: 900px;
            width: 100%;
        }

        .create-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .create-group button {
            background-color: #003399;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .create-group button:hover {
            background-color: #002080;
        }

        .group-list {
            display: block;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 20px;
        }

        .group-info {
            flex-grow: 1;
        }

        .conteni {
            color: #f44336;
            margin-top: 5px;
        }

        .subtit {
            color: black;
        }

        img {
            width: 100%;
            max-width: 400px;
            height: auto;
            border-radius: 8px;
            display: block;
            margin-left:  auto;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #555;
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
                <a href="#">Visualizar Planificaciones</a>
                <a href="#">Lista de tareas Semanal</a>
                <a href="#">Grupo-Empresas</a>
                <a href="#">Calificaciones</a>
            </div>
        </div>

        <div class="logo-container">
            <a class="Logo" href="main_doc.html">WEB GEST</a>
        </div>

        <div class="user-container">
            <div class="user-icon">&#128100;</div>
            <div id="user-dropdown" class="dropdown">
                <a href="#">Profile</a>
                <a href="login.html">Cerrar sesión</a>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="content">
            <div class="create-group">
                <button>Crear Grupo +</button>
            </div>
            <div class="group-list">
                <div class="group-info">
                    <h3 class="subtit">Grupos en curso</h3>
                    <p class="conteni">No hay grupos en curso.</p>
                </div>
                <img src="image.png" alt="Lista de grupos">
            </div>
            <div>
                <h3 class="subtit">Grupos pasados</h3>
                <p class="conteni">No hay grupos pasados.</p>
            </div>
        </div>
    </main>
</body>
</html>
