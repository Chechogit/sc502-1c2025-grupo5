<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <header>
        <h1>Registro de Usuarios</h1>
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
    <main>
        <form action="../php/registrar_usuario.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre Completo" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@email.com" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Contraseña" required>
            
            <button type="submit">Registrarse</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Reservas Municipales.</p>
    </footer>
</body>
</html>
