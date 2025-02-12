
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Grupos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            left: -577px;
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

        .content-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        ol{
            color: rgb(255, 0, 0);
        }

        p{
            color: rgb(255, 0, 0);
        }
        
        .text-container {
            flex: 1;
            padding-right: 20px;
        }

        .image-container img {
            max-width: 300px;
            height: auto;
            border-radius: 8px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #003399;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin: 10px 0;
        }

        .button:hover {
            background-color: #002080;
        }

        .button-atras {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff0000;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin: 30px , 0px;
        }

        .button-atras:hover {
            background-color: #002080;
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

    <div class="content-wrapper">
        <div class="text-container">
            <h1>Lista De Grupos</h1>
            <ol>Lista grupos</ol>
            <a href="crear_grupos.html" class="button">Crear grupo + </a>

            <div class="groups">
                <h2>Grupos en curso</h2>
                <ol>Lista grupos en curso</ol>
                <p>No hay grupos en curso.</p>
            </div>
            <div class="groups">
                <h2>Grupos pasados</h2>
                <ol>Lista grupos pasados</ol>
                <p>No hay grupos pasados.</p>
            </div>
            <a href="main_doc.html" class="button-atras">Atras</a>       
        </div>

        <div class="image-container">
            <img src="image.png" alt="Lista de grupos">
        </div>
    </div>  

</body>
</html>
