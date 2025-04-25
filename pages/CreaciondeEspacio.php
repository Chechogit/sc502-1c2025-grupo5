<?php
session_start();
?>

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
        <h2>Formulario para Crear Espacio</h2>
        <form id="espacioForm">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>
        
            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion" rows="4" cols="40"></textarea><br><br>
        
            <label for="ubicacion">Ubicación:</label><br>
            <input type="text" id="ubicacion" name="ubicacion"><br><br>
        
            <label for="imagen_url">URL de la Imagen:</label><br>
            <input type="text" id="imagen_url" name="imagen_url"><br><br>

            <label>
                <input type="checkbox" id="disponible" name="disponible" checked>
                Disponible
            </label><br><br>
        
            <button type="submit">Crear Espacio</button>
        
        </form>
    </main>

    <footer>
        <p>&copy; 2025 Reservas Municipales. Todos los derechos reservados.</p>
    </footer>

    <!-- Script del formulario -->
    <script src="/sc502-1c2025-grupo5/js/CreacionEspacios.js"></script>
</body>
</html>