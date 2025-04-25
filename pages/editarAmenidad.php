<?php
session_start();
?>


<!DOCTYPE html>
<html lang="es">
<?php
$id = $_GET['id'] ?? '';
if (empty($id)) {
    echo "<p>ID de amenidad no especificado.</p>";
    exit;
}


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
                            <?php if (isset($_SESSION['usuario_nombre'])): ?>
                                <li class="nav-item"><a class="nav-link" href="CreaciondeEspacio.php">Crear Espacio</a></li>
                                <li class="nav-item"><a class="nav-link" href="gestionarAmenidades.php">Gestión de
                                        Espacion</a></li>
                                <li class="nav-item"><a class="nav-link" href="editarUsuario.php">Editar Usuario</a></li>
                            <?php else: ?>
                                <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                                <li class="nav-item"><a class="nav-link" href="registro.php">Registrarse</a></li>
                            <?php endif; ?>
                    </div>
                </div>
            </nav>
            <?php if (isset($_SESSION['nombre'])): ?>
                <li>Hola, <?php echo $_SESSION['nombre']; ?> | <a href="logout.php">Cerrar sesión</a></li>
            <?php endif; ?>
        </div>
    </header>

    <main>
    <form id="form-editar-amenidad">
        <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required>

        <label for="disponible">Disponible:</label>
        <select id="disponible" name="disponible">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>

        <label for="reservado">Reservado:</label>
        <select id="reservado" name="reservado">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>

        <button type="submit">Guardar Cambios</button>
    </form>

    </main>

    <footer>
        <p>&copy; 2025 Reservas Municipales.</p>
    </footer>
</body>

</html>