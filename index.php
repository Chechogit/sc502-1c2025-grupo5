<!-- Logica para registro en base de datos -->

<?php
include "conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $espacio = $_POST['espacio'];
    $fecha = $_POST['fecha'];
    $horario = $_POST['horario'];
    $nombre = $_POST['nombreCompleto'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $evento = $_POST['tipoEvento'];
    $personas = $_POST['cantidadPersonas'];
    $comentarios = $_POST['Comentarios'];

    $sql = "INSERT INTO reservas (espacio, fecha, horario, nombreCompleto, correo, telefono, tipoEvento,cantidadPersonas, Comentarios)
            VALUES ('$espacio', '$fecha', '$horario', '$nombre', '$correo', '$telefono', '$evento','$personas','$comentarios')";

    if ($conexion->query($sql) === TRUE) {
        $mensaje = "Reserva guardada exitosamente.";
        header("Location: pagos.html"); 
    exit();
    } else {
        $mensaje = "Error al guardar la reserva: " . $conexion->error;
    }

    $conexion->close();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas Municipales - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="styles/styles.css">
    <style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #3498db;
        --accent-color: #e74c3c;
        --light-color: #ecf0f1;
        --dark-color: #2c3e50;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        color: var(--dark-color);
    }

    header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 1.5rem 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    nav {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 0.5rem 0;
    }

    nav ul {
        justify-content: center;
    }

    nav a {
        color: white !important;
        font-weight: 500;
        padding: 0.5rem 1.5rem !important;
        transition: all 0.3s;
        border-radius: 4px;
    }

    nav a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    .hero {
        background: url('https://images.unsplash.com/photo-1564501049412-61c2a3083791') center/cover;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        position: relative;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        margin-bottom: 2rem;
        height: 100%;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        color: var(--primary-color);
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .btn-primary {
        background-color: var(--secondary-color);
        border: none;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    .reservation-form {
        background-color: white;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        margin-top: 2rem;
    }

    .form-label {
        font-weight: 600;
    }

    .calendar-container {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .time-slots {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .time-slot {
        padding: 0.5rem 1rem;
        background-color: var(--light-color);
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .time-slot:hover {
        background-color: var(--secondary-color);
        color: white;
    }

    .time-slot.selected {
        background-color: var(--secondary-color);
        color: white;
        font-weight: 600;
    }

    .time-slot.unavailable {
        background-color: #e74c3c;
        color: white;
        cursor: not-allowed;
        opacity: 0.6;
    }

    footer {
        background-color: var(--dark-color);
        color: white;
        padding: 2rem 0;
        margin-top: 3rem;
    }

    .feature-icon {
        font-size: 2.5rem;
        color: var(--secondary-color);
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .hero {
            height: 300px;
        }
    }

    .footer-content {
        width: 100%;
        padding: 0 -5px;
    }

    footer {
        width: 100%;

    }

    #titulo-Principal{
        color: white;
    }
    </style>
</head>

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
                            <li class="nav-item"><a class="nav-link active" href="index.html">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="espacios.html">Espacios</a></li>
                            <li class="nav-item"><a class="nav-link" href="reservas.html">Mis Reservas</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.html">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="hero">
        <div class="hero-content">
            <h2 class="display-4 fw-bold" id="titulo-Principal">Reserva espacios municipales con facilidad</h2>
            <p class="lead">Encuentra y reserva los mejores espacios para tus eventos y actividades</p>
            <a href="#espacios-disponibles" class="btn btn-primary btn-lg mt-3">Ver espacios disponibles</a>
        </div>
    </div>

    <main class="container my-5">
        <section class="mb-5">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h3>Reserva en línea</h3>
                    <p>Reserva cualquier espacio municipal las 24 horas del día desde nuestra plataforma.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h3>Horarios flexibles</h3>
                    <p>Elige el horario que mejor se adapte a tus necesidades, con disponibilidad en tiempo real.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <h3>Pago seguro</h3>
                    <p>Sistema de pago integrado con múltiples opciones para tu comodidad.</p>
                </div>
            </div>
        </section>

        <section id="espacios-disponibles" class="mb-5">
            <h2 class="text-center mb-4">Espacios Disponibles</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://lh3.googleusercontent.com/p/AF1QipM8sx3EAmRJlwMolL-LydJXEyLpaLHIPhh7oSrT=s680-w300-h510"
                            class="card-img-top" alt="Piscina Municipal" style="width: 500px; height: 200px">
                        <div class="card-body">
                            <h3 class="card-title">Piscina Municipal</h3>
                            <div class="card-text">
                                <p><i class="bi bi-geo-alt"></i> San José, Pozos, Lagos de Lindora</p>
                                <p><i class="bi bi-telephone"></i> 2203 1906</p>
                                <div class="mb-3">
                                    <h6>Horario:</h6>
                                    <ul class="list-unstyled">
                                        <li>Lunes a Viernes: 5am - 9pm</li>
                                        <li>Sábado: 6am - 12pm</li>
                                        <li>Domingo: Cerrado</li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-success">Disponible</span>
                                    <span class="text-muted">Desde ₡5,000</span>
                                </div>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservaModal"
                                    data-espacio="Piscina Municipal">Reservar ahora</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://lh3.googleusercontent.com/p/AF1QipN04GJ1qz1IKWS4XhmESAbTeBvuqntQDha6pEQg=s680-w300-h510"
                            class="card-img-top" alt="Cancha de Fútbol"  style="width: 500px; height: 200px">
                        <div class="card-body">
                            <h3 class="card-title">Cancha de Fútbol</h3>
                            <div class="card-text">
                                <p><i class="bi bi-geo-alt"></i> Provincia de Alajuela, Alajuela</p>
                                <p><i class="bi bi-telephone"></i> 2441 3535</p>
                                <div class="mb-3">
                                    <h6>Horario:</h6>
                                    <ul class="list-unstyled">
                                        <li>Lunes a Domingo: 8am - 10pm</li>
                                        <li>&nbsp;</li>
                                        <li>&nbsp;</li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-success">Disponible</span>
                                    <span class="text-muted">Desde ₡8,000</span>
                                </div>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservaModal"
                                    data-espacio="Cancha de Fútbol">Reservar ahora</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <img src="https://laperla.heredia.go.cr/sites/default/files/styles/landscape_photo/public/2021-09/salon-1_2.jpg.webp?itok=2Y-HSAgw"
                            class="card-img-top" alt="Salón para Actividades"  style="width: 500px; height: 200px">
                        <div class="card-body">
                            <h3 class="card-title">Salón para Actividades</h3>
                            <div class="card-text">
                                <p><i class="bi bi-geo-alt"></i> Mercedes Norte de Heredia</p>
                                <p><i class="bi bi-telephone"></i> 2277 6759</p>
                                <div class="mb-3">
                                    <h6>Horario:</h6>
                                    <ul class="list-unstyled">
                                        <li>Martes a Domingo: 6am - 11pm</li>
                                        <li>Lunes: Cerrado</li>
                                        <li>&nbsp;</li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-success">Disponible</span>
                                    <span class="text-muted">Desde ₡15,000</span>
                                </div>
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservaModal"
                                    data-espacio="Salón para Actividades">Reservar ahora</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2>¿Cómo funciona?</h2>
                    <div class="accordion" id="comoFunciona">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#paso1">
                                    Paso 1: Selecciona el espacio
                                </button>
                            </h3>
                            <div id="paso1" class="accordion-collapse collapse show" data-bs-parent="#comoFunciona">
                                <div class="accordion-body">
                                    Explora nuestros espacios disponibles y selecciona el que mejor se adapte a tus
                                    necesidades.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#paso2">
                                    Paso 2: Elige fecha y hora
                                </button>
                            </h3>
                            <div id="paso2" class="accordion-collapse collapse" data-bs-parent="#comoFunciona">
                                <div class="accordion-body">
                                    Selecciona la fecha y hora que deseas reservar. Nuestro sistema te mostrará la
                                    disponibilidad en tiempo real.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#paso3">
                                    Paso 3: Completa tus datos
                                </button>
                            </h3>
                            <div id="paso3" class="accordion-collapse collapse" data-bs-parent="#comoFunciona">
                                <div class="accordion-body">
                                    Ingresa tus datos personales y los detalles de tu evento o actividad.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#paso4">
                                    Paso 4: Realiza el pago
                                </button>
                            </h3>
                            <div id="paso4" class="accordion-collapse collapse" data-bs-parent="#comoFunciona">
                                <div class="accordion-body">
                                    Realiza el pago de forma segura a través de nuestro sistema integrado.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#paso5">
                                    Paso 5: Confirma tu reserva
                                </button>
                            </h3>
                            <div id="paso5" class="accordion-collapse collapse" data-bs-parent="#comoFunciona">
                                <div class="accordion-body">
                                    Recibirás un correo electrónico con los detalles de tu reserva y un código QR para
                                    acceder al espacio.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978" alt="Proceso de reserva"
                        class="img-fluid rounded">
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade" id="reservaModal" tabindex="-1" aria-labelledby="reservaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservaModalLabel">Reservar espacio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 
                    <?php if (!empty($mensaje)): ?>
                    <div class="alert alert-info"><?php echo $mensaje; ?></div>
                    <?php endif; ?>

                    <form id="reservaForm" action="" method="POST">
                        <div class="mb-3">
                            <label for="espacio" class="form-label">Espacio seleccionado</label>
                            <input type="text" class="form-control" id="espacio" name="espacio" readonly>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fechaReserva" class="form-label">Fecha de reserva</label>
                                    <input type="date" class="form-control" id="fechaReserva" name="fecha"
                                        required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="horario">Horario disponible</label>
                                    <select id="horario" class="form-select" name="horario" required>
                                        <option value="8-9">8:00 - 9:00</option>
                                        <option value="9-10">9:00 - 10:00</option>
                                        <option value="10-11">10:00 - 11:00</option>
                                        <option value="11-12">11:00 - 12:00</option>
                                        <option value="12-13">12:00 - 13:00</option>
                                        <option value="13-14">13:00 - 14:00</option>
                                        <option value="14-15">14:00 - 15:00</option>
                                        <option value="15-16">15:00 - 16:00</option>
                                        <option value="16-17">16:00 - 17:00</option>
                                        <option value="17-18">17:00 - 18:00</option>
                                        <option value="18-19">18:00 - 19:00</option>
                                        <option value="19-20">19:00 - 20:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombre" name="nombreCompleto" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="correo" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="personas" class="form-label">Número de personas</label>
                                    <input type="number" class="form-control" id="personas" name="cantidadPersonas" min="1"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="evento" class="form-label">Tipo de evento/actividad</label>
                            <select class="form-select" id="evento" name="tipoEvento" required>
                                <option value="" selected disabled>Seleccione una opción</option>
                                <option value="deportivo">Evento deportivo</option>
                                <option value="social">Evento social</option>
                                <option value="cultural">Evento cultural</option>
                                <option value="educativo">Evento educativo</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="comentarios" class="form-label">Comentarios adicionales</label>
                            <textarea class="form-control" id="comentarios" name="Comentarios" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Continuar al pago</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="text-center bg-dark py-4">

        </div>
        <hr class="my-4 bg-light">
        <p class="mb-0">&copy; 2025 Sistema de Reservas Municipales. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
    flatpickr("#fechaReserva", {
        locale: "es",
        minDate: "today",
        dateFormat: "Y/m/d",
        disable: [
            function(date) {
                return (date.getDay() === 0);
            }
        ]
    });

    const reservaModal = document.getElementById('reservaModal');
    reservaModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const espacio = button.getAttribute('data-espacio');
        const modalTitle = reservaModal.querySelector('.modal-title');
        const espacioInput = reservaModal.querySelector('#espacio');

        modalTitle.textContent = `Reservar ${espacio}`;
        espacioInput.value = espacio;
    });

    const timeSlots = document.querySelectorAll('.time-slot:not(.unavailable)');
    timeSlots.forEach(slot => {
        slot.addEventListener('click', function() {
            document.querySelectorAll('.time-slot.selected').forEach(selected => {
                selected.classList.remove('selected');
            });

            this.classList.add('selected');
        });
    });
    </script>
</body>

</html>