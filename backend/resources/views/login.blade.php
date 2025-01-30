<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Web TIS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4169E1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            width: 800px;
            display: flex;
            padding: 20px;
            border-radius: 10px;
        }
        .image-section {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .image-section img {
            width: 100%;
            border-radius: 10px;
        }
        .image-section .text {
            position: absolute;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .form-section {
            width: 50%;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: #4169E1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .links {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            align-items: center;
        }
        .links label {
            display: flex;
            align-items:center;
        }
        .links input {
            margin-right: 5px;
        }
        .links a {
            text-decoration: none;
            color: #4169E1;
        }
        .signup {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-section">
            <img src="image.png" alt="Imagen de fondo">
            <div class="text">WEB TIS</div>
        </div>
        <div class="form-section">
            <h2>BIENVENIDO</h2>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
            <a href="docente_grupos"><button class="login-btn">Login</button></a>
            <div class="links">
                <label><input type="checkbox"> Recordar contraseña</label>
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <p class="signup">No tienes cuenta?</p>
            <p class="signup"><a href="registro_est">Crear Cuenta</a></p>
        </div>
    </div>
</body>
</html>
