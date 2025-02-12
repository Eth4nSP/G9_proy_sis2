
<!DOCTYPE html>
<html lang="en">
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
            background-color: #3366cc;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        header .menu {
            font-size: 18px;
            cursor: pointer;
        }

        header .user-icon {
            font-size: 18px;
            cursor: pointer;
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
            left: -590px;
            text-decoration: none;
            font-weight:550 ;
        }

        .dropdown {
            position: absolute;
            top: 50px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: none;
            width: 200px;
            z-index: 1000;
        }

        .dropdown.active {
            display: block;
        }

        #menu-dropdown {
            left: 10px;
        }

        #user-dropdown {
            right: 10px;
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

        .container {
            max-width: 800px;
	    height: 400px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	    left: 300px;

        }

        .container h1 {
            font-size: 24px;
            color: #063970;
            margin-bottom: 20px;
	    left: 300px;
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

        .groups {
            margin-top: 20px;
        }

        .groups p {
            color: red;
            font-size: 16px;
        }

        .image-container {
	    width:600px;
            margin-top: 30px;
	    transform: translate(500px, -150px);
		
        }

        .image-container img {
            max-width: 100%;
            height: auto;
	left: 300px;
        }
    </style>
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
</head>
<body>
    <header>
        <div class="menu">&#9776;</div>
        <div id="menu-dropdown" class="dropdown">
            <a href="#">Visualizar Planificaciones</a>
            <a href="#">Lista de tareas Semanal</a>
            <a href="#">Grupo-Empresas</a>
            <a href="#">Calificaciones</a>
        </div>

        <div class="logo-container">
            <a class="Logo" href="main_doc.html">WEB GEST</a>
        </div>

        <div class="user-icon">&#128100;
            <div id="user-dropdown" class="dropdown">
                <a href="#">Profile</a>
                <a href="login.html">Cerrar sesión</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Lista De Grupos</h1>
	<ol>Lista grupos</ol>
        <a href="listaGrupos" class="button">Inscríbete a un grupo</a>

        <div class="groups">
            <h2>Grupos pasados</h2>
	    <ol>Lista grupos pasados</ol>
            <p>No hay grupos pasados.</p>
        </div>

        <div class="image-container">
            <img src="group_image_placeholder.png" alt="Imagen">
        </div>
    </div>
</body>
</html>
