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
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        .btn-danger {
            background-color: red;
        }
        .input-field, .input-small {
            padding: 5px;
            margin-bottom: 10px;
        }
        .input-small {
            width: 50px;
        }
        .input-field {
            width: 700px;
            height: auto;
        }
        .radio-group {
            margin-top: 10px;
        }

        .date {
            width: 250px;
            height: 25px;
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
            <button class="btn btn-back "onclick="history.back()">ATRÁS</button>
            <h2>Evaluación</h2>
            <h3>Criterios</h3>
            <input type="text" class="input-field" placeholder="Criterio">
            <label>Nota Máxima</label>
            <input type="text" class="input-small" value="50">
            <br>
            <button class="btn btn-primary">Agregar criterio</button>
            <div class="radio-group">
                <h4>Tipo de Evaluación</h4>
                <input type="radio" name="evaluacion" id="auto"> <label for="auto">AutoEvaluación</label><br>
                <input type="radio" name="evaluacion" id="cruzada"> <label for="cruzada">Evaluación Cruzada</label><br>
                <input type="radio" name="evaluacion" id="pares"> <label for="pares">Evaluación Pares</label>
            </div>
            <br>
            <label>Fecha de evaluación</label>
            <input type="date" class="date">
            <br>
            <button class="btn btn-primary">Aceptar</button>
            <button class="btn btn-danger">Cancelar</button>
        </div>
    </body>
    </html>
        