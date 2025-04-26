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
                            <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                            <li class="nav-item"><a class="nav-link" href="registro.php">Registrarse</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <h2>Realizar Pago</h2>
        <form action="procesar_pago.html" method="POST">
            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="monto">Monto a Pagar:</label>
            <input type="number" id="monto" name="monto" min="1" required>
            <label for="tarjeta">Número de Tarjeta:</label>
            <input type="text" id="tarjeta" name="tarjeta" maxlength="16" required>
            <label for="expiracion">Fecha de Expiración:</label>
            <input type="month" id="expiracion" name="expiracion" required>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" maxlength="3" required>
            <button type="submit">Pagar</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Reservas Municipales.</p>
    </footer>
</body>
</html>
