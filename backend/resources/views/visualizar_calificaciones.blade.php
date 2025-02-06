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
            box-sizing: border-box;
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
            right: 0px;
           top: 35px;
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
            width: 80%;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-danger {
            background-color: red;
            color: white;
        }
        .text-red {
            color: red;
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
           <div class="menu">&#9776; </div>
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
   <div class="container">
    <button class="btn btn-danger"onclick="history.back()">ATRÁS</button>
    <h2>VISUALIZACIÓN DE LAS CALIFICACIONES DEL PROYECTO</h2>
    <table>
        <tr>
            <th>Nombre integrante</th>
            <th>Sprint 1</th>
            <th>Sprint 2</th>
        </tr>
        <tr>
            <td>Ana Garcia Sanchez</td>
            <td class="text-red">16</td>
            <td>80</td>
        </tr>
        <tr>
            <td>Miguel Gisbert Rodrigues</td>
            <td class="text-red">16</td>
            <td>80</td>
        </tr>
        <tr>
            <td>Pedro Pascal Mendoza</td>
            <td class="text-red">16</td>
            <td>80</td>
        </tr>
        <tr>
            <td>Roger Ponce Rojas</td>
            <td class="text-red">16</td>
            <td>80</td>
        </tr>
        <tr>
            <td>Esteban Quito Perez</td>
            <td class="text-red">16</td>
            <td>80</td>
        </tr>
        <tr>
            <td>Diego Sancho Panza</td>
            <td class="text-red">16</td>
            <td>80</td>
        </tr>
    </table>
</div>
</body>
</html>
