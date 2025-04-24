<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <header>
        <h1>Iniciar Sesión</h1>
        <?php if (isset($_SESSION['nombre'])): ?>
            <li>Hola, <?php echo $_SESSION['nombre']; ?> | <a href="logout.php">Cerrar sesión</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="registro.php">Registro</a></li>
        <?php endif; ?>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="pagos.php">Pagos</a></li>
                <li><a href="espacios.php">Espacios</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registro.php">Registro</a></li>
            </ul>
        </nav>
    </header>

    <!-- Mensaje de que el usuario se registró correctamente -->
    <?php
    if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado') {
        echo "<script type='text/javascript'>alert('¡Registro exitoso! Iniciá sesión.');</script>";
    }
    ?>
    
    <main>
        <section id="login">
            <h2>Accede a tu cuenta</h2>
            <form action="../php/procesar_login.php" method="POST">
                <label for="usuario">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
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
