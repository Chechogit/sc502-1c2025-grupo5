<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="/sc502-1c2025-grupo5/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/sc502-1c2025-grupo5/js/login.js"></script>
</head>
<body>
    <header>
        <h1>Inicio de Sesión</h1>
        <nav>
            <ul>
                <li><a href="/sc502-1c2025-grupo5/index.PHP">Inicio</a></li>
            </ul>
        </nav>
    </header>
 
    <main>
        <form id="form-login">
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>
 
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
 
            <button type="submit">Iniciar Sesión</button>
        </form>
 
        <!-- Mensaje para usuarios no registrados -->
        <div id="mensaje-registrarse">
            <p>¿No tienes cuenta? <a href="/sc502-1c2025-grupo5/pages/registro.html">Regístrate aquí</a></p>
        </div>
    </main>
 
    <footer>
        <p>&copy; 2025 Reservas Municipales.</p>
    </footer>
</body>
</html>