<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="/sc502-1c2025-grupo5/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/sc502-1c2025-grupo5/js/editarUsuario.js"></script>
</head>
    
    <body>
    
    <header>
    <div class="container">
        <h1 class="text-center mb-0">Gestión de Reservas Municipales</h1>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active" href="../index.php">Inicio</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php if (isset($_SESSION['nombre'])): ?>
            <li>Hola, <?php echo $_SESSION['nombre']; ?> | <a href="logout.php">Cerrar sesión</a></li>
        <?php endif; ?>
    </div>
</header>

    <main>
        <form id="form-modificar">
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" required>

            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Nueva Contraseña:</label>
            <input type="password" id="password" name="password">

            <button type="submit">Guardar Cambios</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 Reservas Municipales.</p>
    </footer>
</body>
</html>
