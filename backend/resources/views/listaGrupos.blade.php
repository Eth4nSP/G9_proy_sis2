<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Docente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2c56b8;
            color: white;
            padding: 10px 20px;
            position: relative;
        }

        .menu {
            cursor: pointer;
            font-size: 18px;
        }

        .user-icon {
            cursor: pointer;
            position: relative;
            font-size: 18px;
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 10;
        }

        .dropdown a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
            font-size: 14px;
        }

        .dropdown a:hover {
            background-color: #f1f1f1;
        }

        #menu-dropdown {
            top: 40px;
            left: 20px;
        }

        #user-dropdown {
            top: 40px;
            right: 20px;
        }

        .dropdown.active {
            display: block;
        }

        main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: white;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }


        .docente-list button {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #d3d3d3;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .docente-list button:hover {
            background-color: #b0b0b0;
        }


        .illustration {
            flex: 1;
            text-align: center;
        }

        .illustration img {
            max-width: 80%;
        }

	.volver {
    	text-align: center; /* Centra el botón dentro de su contenedor */
    	margin-top: 20px;
    	transform: translate(-625px, 250px);
	}

	.volver button {
    	display: inline-block;	 	    
    	padding: 15px 30px;
    	background-color: #d3d3d3;
    	border: none; /* Elimina el borde del botón */
    	outline: none; /* Elimina el borde de foco */
    	border-radius: 5px; /* Redondea los bordes */
    	font-size: 16px;
    	font-weight: bold;
    	cursor: pointer;		  
    	transition: background-color 0.3s ease;
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
        <div class="menu">&#9776; WEB TIS</div>
        <div id="menu-dropdown" class="dropdown">
            <a href="#">Visualizar Planificaciones</a>
            <a href="#">Lista de tareas Semanal</a>
            <a href="#">Grupo-Empresas</a>
            <a href="#">Calificaciones</a>
        </div>
        <div class="user-icon">&#128100;
            <div id="user-dropdown" class="dropdown">
                <a href="#">Perfil</a>
                <a href="#">Cerrar sesión</a>
            </div>
        </div>
    </header>
    <main>
        <div class="docente-list">
            <h2>SELECCIONAR DOCENTE PARA MATRICULACIÓN</h2>
            <a href="{{url('/matricularse')}}"><button>BLANCO COCA LETICIA</button></a>
            <button>FLORES VILLARROEL CORINA</button>
            <button>GRIEGO VAZQUES ESTEBAN</button>
            <button>BLANCO COCA LETICIA</button>
        </div>
        <div class="illustration">
            <img src="https://via.placeholder.com/400x300" alt="Ilustración de docente">
        </div>
		<div class ="volver">
		<button>Volver</button>
	</div> 
    </main>
</body>
</html>
