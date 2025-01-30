<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Grupo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            text-align: center;
        }

        /* Estilos del header */
        header {
            background-color: #3367d6;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            position: relative;
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

        /* Estilos del dropdown */
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

        /* Contenedor del formulario */
        .container {
            margin: 50px auto;
            width: 50%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        input, select, textarea {
            width: 100%;
            margin: 10px;
            margin-right:90px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
           box-sizing: border-box;
        }

        .info {
            color: blue;
            font-size: 14px;
        }

        .submit-btn {
            background-color: #3f51b5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            text-align: center;
        }

        .submit-btn:hover {
            background-color: #2c3e97;
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
            <div class="menu">&#9776; WEB TIS</div>
            <div id="menu-dropdown" class="dropdown">
                <a href="#">Visualizar Planificaciones</a>
                <a href="#">Lista de tareas Semanal</a>
                <a href="#">Grupo-Empresas</a>
                <a href="#">Calificaciones</a>
            </div>
        </div>
        <div class="user-container">
            <div class="user-icon">&#128100;</div>
            <div id="user-dropdown" class="dropdown">
                <a href="#">Profile</a>
                <a href="#">Cerrar sesión</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h2>CREAR GRUPO</h2>
        <input type="text" placeholder="Número de grupo">
        <select>
            <option>2024-1</option>
        </select>
        <input type="text" placeholder="Código de Acceso">
        <p class="info">Cuando termina una fase inmediatamente comienza la próxima.<br> Todas las fechas terminan en 23:00</p>
        <label>Inicio semestre</label>
        <input type="date">
        <label>Inicio grupo</label>
        <input type="date">
        <label>Inicio proyecto</label>
        <input type="date">
        <label>Fin grupo</label>
        <input type="date">
        <label>Fin proyecto</label>
        <input type="date">
        <label>Fin semestre</label>
        <input type="date">
        <textarea placeholder="Comentarios"></textarea>
        <button class="submit-btn">Crear Grupo</button>
    </div>
</body>
</html>