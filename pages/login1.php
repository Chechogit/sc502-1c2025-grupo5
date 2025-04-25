<!DOCTYPE html>
<html lang="es">
<?php
include('../partitions/head.php')
?>
<body>
<header>
        <div class="container">
            <h1 class="text-center mb-0">Gestión de Reservas Municipales</h1>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item"><a class="nav-link active" href="../index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="espacios.php">Espacios</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                            <li class="nav-item"><a class="nav-link" href="registro.php">Registrarse</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <section id="login">
            <h2>Accede a tu cuenta</h2>
            <form action="dashboard.html" method="POST">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Ingresar</button>
            </form>
            <p>¿No tienes cuenta? <a href="registro.html">Regístrate aquí</a></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Reservas Municipales.</p>
    </footer>
</body>
</html>
