<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Equipo</title>
    <style>
        .equipos-lista {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .equipo-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }
        .button {
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .nota-input {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .cancel-btn {
            background-color: #ff0000;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 5%;
            text-align: center;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <header>
        <!-- Contenido de tu header aquí -->
    </header>
    
    <div class="container">
        <button class='cancel-btn'style="background:red" class="btn btn-back" onclick="history.back()">ATRÁS</button>
        <h2>Selecciona un equipo</h2>
        <div class="equipos-lista" id="equipos-lista"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('http://127.0.0.1:8000/ver-equipos')
                .then(response => response.json())
                .then(data => {
                    const equiposLista = document.getElementById('equipos-lista');

                    data.forEach(equipo => {
                        const equipoCard = document.createElement('div');
                        equipoCard.classList.add('equipo-card');
                        
                        const equipoNombre = document.createElement('h3');
                        equipoNombre.textContent = equipo.nombre_equipo;
                        
                        const equipoDescripcion = document.createElement('p');
                        equipoDescripcion.textContent = `id: ${equipo.id_equipo}`;
                        
                        const notaInput = document.createElement('input');
                        notaInput.type = 'number';
                        notaInput.classList.add('nota-input');
                        notaInput.min = 0;
                        notaInput.max = 100;
                        notaInput.placeholder = "Ingrese nota (0-100)";

                        const calificarBtn = document.createElement('button');
                        calificarBtn.classList.add('button');
                        calificarBtn.textContent = 'Calificar';
                        
                        calificarBtn.addEventListener('click', () => {
                            const nota = parseInt(notaInput.value);
                            if (isNaN(nota) || nota < 0 || nota > 100) {
                                alert('Ingrese un número válido entre 0 y 100');
                                return;
                            }

                            fetch('http://127.0.0.1:8000/calificar-equipo', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    id_equipo: equipo.id_equipo,
                                    nota: nota
                                })
                            })
                            .then(response => response.json())
                            .then(result => {
                                alert(`Calificación enviada: ${result.mensaje}`);
                            })
                            .catch(error => {
                                console.error('Error al enviar la calificación:', error);
                            });
                        });

                        const verArchivosBtn = document.createElement('a');
                        verArchivosBtn.href = `/descargar-archivos/${equipo.nombre_equipo}`;
                        const descargarBtn = document.createElement('button');
                        descargarBtn.classList.add('button');
                        descargarBtn.textContent = 'Descargar Archivos';
                        verArchivosBtn.appendChild(descargarBtn);
                        
                        equipoCard.appendChild(equipoNombre);
                        equipoCard.appendChild(equipoDescripcion);
                        equipoCard.appendChild(notaInput);
                        equipoCard.appendChild(calificarBtn);
                        equipoCard.appendChild(verArchivosBtn);
                        equiposLista.appendChild(equipoCard);
                    });
                })
                .catch(error => {
                    console.error('Error al cargar los equipos:', error);
                });
        });
    </script>
</body>
</html>