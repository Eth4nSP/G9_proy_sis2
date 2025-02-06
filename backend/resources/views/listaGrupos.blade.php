<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Docente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2c56b8;
            color: white;
            padding: 10px 20px;
        }
        .docente-list {
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
    </style>
</head>
<body>
    <header>
        <div class="menu">&#9776; WEB TIS</div>
        <div class="user-icon">&#128100;</div>
    </header>
    <main>
        <div class="docente-list">
            <h2>SELECCIONAR DOCENTE PARA MATRICULACIÓN</h2>
            <div id="docentes-container">Cargando...</div>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            fetch("http://127.0.0.1:8000/estudiante/gruposDisponibles") // Ajusta esta ruta a tu endpoint de Laravel
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById("docentes-container");
                    container.innerHTML = ""; // Limpiar el contenido previo
                    data.forEach(grupo => {
                        const button = document.createElement("button");
                        button.textContent = `${grupo.apellido_paterno} ${grupo.apellido_materno} ${grupo.nombre}`;
                        button.onclick = () => {
    window.location.href = '/matricularse2/' + grupo.id_grupo;
};
                        container.appendChild(button);
                    });
                })
                .catch(error => {
                    console.error("Error al obtener los datos:", error);
                    document.getElementById("docentes-container").textContent = "Error al cargar los docentes.";
                });
        });
    </script>
</body>
</html>
