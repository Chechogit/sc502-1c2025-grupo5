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
        <div class="form-container">
            <h2>Selecciona el espacio que deseas reservar</h2>
            <form id="formReserva">
                <label for="espacio">Espacio a reservar:</label>
                <select id="espacio" name="espacio" required>
                    <option value="">--Selecciona un espacio--</option>
                    <option value="piscina">Piscina</option>
                    <option value="cancha_futbol">Cancha de Fútbol</option>
                    <option value="cancha_basket">Cancha de Baloncesto</option>
                    <option value="salon_actividades">Salón de Actividades</option>
                </select>
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="fecha">Fecha de Reserva:</label>
                <input type="date" id="fecha" name="fecha" required>
                <label for="hora">Hora de Reserva:</label>
                <input type="number" id="hora" name="hora" min="8" max="20" required>
                <button type="submit">Reservar</button>
            </form>
            <div id="confirmacion" class="confirmacion">
                ¡Espacio agendado con éxito!
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Reservas Municipales.</p>
    </footer>

    <script>
        document.getElementById('formReserva').addEventListener('submit', function(event) {
            event.preventDefault();  
            document.getElementById('confirmacion').style.display = 'block';
            document.getElementById('formReserva').reset();
            setTimeout(function() {
                document.getElementById('confirmacion').style.display = 'none';
            }, 3000); 
        });
    </script>
</body>
</html>
