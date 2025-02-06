<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
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
        .logo-container, .user-container {
            position: relative;
            display: inline-block;
            margin: left 50px;
        }

        .Logo{   
            color: white;
            display: flex;
            position: relative;
            left: -577px;
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

        /* Estilos de la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }

        /* Estilos del botón */
        button {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
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
<body>
    <button style= 'background-color: red'class="btn btn-back "onclick="history.back()">ATRÁS</button>
    <h1>Lista de Estudiantes</h1>
    <button onclick="downloadExcel()">Descargar Excel</button>
    <table id="estudiantesTable">
        <thead>
            <tr>
                <th>Nombre Equipo</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los datos de los estudiantes se llenarán aquí dinámicamente -->
        </tbody>
    </table>

    <script>
        // Función para hacer el fetch y mostrar los datos en la tabla
        fetch('/listaEstudiante')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#estudiantesTable tbody');
                
                // Limpiar la tabla antes de agregar los nuevos datos
                tableBody.innerHTML = '';

                // Agregar cada estudiante a la tabla
                data.forEach(estudiante => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${estudiante.nombre_equipo}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error al obtener los datos:', error));

        // Función para descargar la tabla como archivo Excel (.xlsx)
        function downloadExcel() {
            const table = document.getElementById('estudiantesTable');
            let html = table.outerHTML;

            const blob = new Blob([html], { type: 'application/vnd.ms-excel' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'estudiantes_lista.xls';
            link.click();
        }
    </script>
</body>
</html>
