<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Estudiante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-group {
            display: flex;
            gap: 10px;
        }
        .btn {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn2{
            background: #fd0d0d;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            top:    0px;
            position: relative;
            top:    -209px; /* Fija el contenedor 20px desde la parte superior */
            left: 390px;
        }
        .btn:hover {
            background: #0b5ed7;
        }
        .footer {
            margin-top: 10px;
            font-size: 14px;
        }
        .footer a {
            color: #0d6efd;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div>
    <a href="/"><button type="cancel" class="btn2">X</button>  </a>
    </div>
    <div class="container">
        <h2>REGISTRO ESTUDIANTE</h2>
        <form>
            <input type="text" placeholder="Nombres" required>
            <div class="input-group">
                <input type="text" placeholder="Apellido Paterno" required>
                <input type="text" placeholder="Apellido Materno" required>
            </div>
            <input type="email" placeholder="Correo Electrónico" required>
            <input type="text" placeholder="Nombre de la Cuenta" required>
            <input type="password" placeholder="Contraseña" required>
            <input type="password" placeholder="Repetir Contraseña" required>
            <button type="submit" class="btn">REGISTRARSE</button>
        </form>
        <div class="footer">
            ¿Ya tienes cuenta? <a href="inscribirGrupo">Iniciar Sesión</a>
        </div>
    </div>
</body>
</html>
