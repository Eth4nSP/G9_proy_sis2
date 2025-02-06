<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Estudiantes</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const selectEstudiante = document.getElementById("estudiantes");
            const listaSeleccionados = document.getElementById("lista-integrantes");
            const form = document.getElementById("form-integrantes");
            let estudiantesSeleccionados = [];

            // Obtener lista de estudiantes sin equipo
            fetch("/estudiante/obtenerEstudiantesSinEquipo")
                .then(response => response.json())
                .then(data => {
                    data.forEach(estudiante => {
                        let option = document.createElement("option");
                        option.value = estudiante.id_estudiante;
                        option.textContent = `${estudiante.nombre} ${estudiante.apellido_paterno} ${estudiante.apellido_materno}`;
                        selectEstudiante.appendChild(option);
                    });
                });

            // Agregar estudiante a la lista
            document.getElementById("agregar").addEventListener("click", function () {
                let selectedId = selectEstudiante.value;
                let selectedText = selectEstudiante.options[selectEstudiante.selectedIndex].text;
                
                if (selectedId && !estudiantesSeleccionados.includes(selectedId)) {
                    estudiantesSeleccionados.push(selectedId);
                    let li = document.createElement("li");
                    li.textContent = selectedText;
                    listaSeleccionados.appendChild(li);
                }
            });

            // Enviar la lista seleccionada al backend
            form.addEventListener("submit", function (event) {
                event.preventDefault();
                
                fetch("http://127.0.0.1:8000/estudiante/actualizarIntegrantes", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ integrantes: estudiantesSeleccionados })
                })
                .then(response => response.json())
                .then(data => alert(data.mensaje))
                .catch(error => console.error("Error:", error));
            });
        });
    </script>
</head>
<body>
    <h2>Seleccionar Estudiantes</h2>
    <label for="estudiantes">Elige un estudiante:</label>
    <select id="estudiantes"></select>
    <button id="agregar">Agregar</button>

    <h3>Estudiantes Seleccionados:</h3>
    <ul id="lista-integrantes"></ul>

    <form id="form-integrantes">
        <button type="submit">Actualizar Integrantes</button>
    </form>
</body>
</html>
