<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Proyecto</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/pagos.css">
    <script src="../js/script.js" defer></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color: #04325b;">
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

    <div class="infoGeneral">
        <div class="contenidoCentral">

            <div>
                <h4 class="subTitulos">Confirmación de Pago</h4>
                <h6>Llena los espacios en blanco con tus datos correspondiestes</h6>
                <hr>
            </div>

            <div class="mb-5">
                <h4 class="subTitulos">Completa la infomación de pago</h4>
                <div class="informacionPago">
                    <div class="row align-items-start mb-4">
                        <div class="mb-3 col">
                            <label class="form-label subTitulos">Nº TARJETA</label>
                            <div>
                                <i class="bi bi-credit-card"></i>
                                <input type="number" class="informacionPago-nTarjeta" id="nTarjeta"
                                    placeholder="Número de Tarjeta">
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label subTitulos">TITULAR DE LA TARJETA</label>
                            <div>
                                <i class="bi bi-person-check"></i>
                                <input type="text" class="informacionPago-titularTarjeta" id="titularTarjeta"
                                    placeholder="Titular de la Tarjeta">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start">
                        <div class="mb-3 col">
                            <label class="form-label subTitulos">FECHA DE EXPIRACIÓN</label>
                            <div>
                                <i class="bi bi-calendar2-week"></i>
                                <input type="month" class="informacionPago-titularTarjeta" id="fechaExpiracion">
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label subTitulos">CVV</label>

                            <i id="cvvQueEs" class="bi bi-question-circle-fill"></i>
                            <div>
                                <img id="imgCVV" class="imgInfoCVV"
                                    src="https://www.bbva.com.ar/content/dam/public-web/argentina/images/Imagen_tarjeta_1.im1710786753063im.png?imwidth=1176"
                                    height="200" width="300">
                            </div>
                            <div>
                                <i class="bi bi-lock"></i>
                                <input type="number" class="informacionPago-nCVV" id="nCvv"
                                    placeholder="Código de Seguridad">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <h4 class="subTitulos">Terminos y Condinciones</h4>
                <hr>

                <div class="pagoTerminosCondiciones mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et nisl sit amet enim dapibus
                    scelerisque ac sed nisi. Sed porta tincidunt lacus, a molestie enim consequat at. Cras sit amet
                    condimentum nibh. Phasellus facilisis ligula felis, nec auctor purus viverra et. Nam pulvinar
                    vulputate ante nec placerat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                    inceptos himenaeos. Duis maximus vehicula tincidunt. Aliquam maximus et mauris nec ornare. Morbi
                    facilisis rutrum arcu, non fringilla sem vestibulum at. Phasellus laoreet ex et enim mollis cursus.
                    Nunc luctus a metus in cursus.<br>

                    <br>

                    Curabitur vel rhoncus magna. Suspendisse faucibus est ut sem faucibus, eget lobortis libero
                    dignissim. Vivamus lacinia magna a ante tincidunt, vitae facilisis metus dapibus. Donec iaculis
                    egestas tellus quis ullamcorper. Cras vulputate bibendum purus. Etiam dignissim malesuada fringilla.
                    Nullam et dolor vel risus venenatis scelerisque et ut felis. Suspendisse id est quam. Aliquam sed
                    est at lorem fringilla molestie. Sed sit amet gravida ex. Fusce molestie lacus ut sapien congue
                    rutrum. Nam vitae pharetra velit, in iaculis diam. Nulla id arcu dapibus, ultrices enim dapibus,
                    ornare est. Curabitur sem massa, rhoncus eu nibh vestibulum, hendrerit suscipit libero. Curabitur
                    placerat ac erat vitae varius. Quisque consectetur gravida risus pellentesque consequat.<br>

                    <br>

                    Sed egestas justo lorem, in pulvinar nibh blandit at. Aliquam ultrices ornare nisl vitae malesuada.
                    Vestibulum nec urna gravida ligula bibendum fermentum. Donec molestie tellus non vulputate ornare.
                    Nulla facilisi. Donec aliquam nisi convallis lacus vulputate pulvinar. Phasellus sapien massa,
                    condimentum vitae aliquam eget, aliquam ut elit. Praesent consectetur libero sed lectus efficitur
                    gravida. Donec a accumsan massa, ut mattis tortor. Interdum et malesuada fames ac ante ipsum primis
                    in faucibus.<br>

                    <br>

                    In porta dolor at augue fringilla, sit amet sollicitudin dui sodales. Sed elementum, nunc a
                    consequat accumsan, leo ipsum congue nibh, vulputate sagittis nisl elit nec velit. Aenean rutrum
                    laoreet maximus. Morbi efficitur eleifend erat, vitae efficitur velit. Suspendisse vulputate lacinia
                    dui in varius. Mauris eu orci a nunc aliquet iaculis ut nec sem. Aliquam ultricies tortor augue, sit
                    amet elementum nibh sagittis vel. Integer dapibus dolor ante, vitae rhoncus sapien pretium in.
                    Aliquam imperdiet vulputate neque, eget vulputate leo consectetur sed. Duis placerat, nisl ut
                    viverra mattis, lectus velit varius dolor, et venenatis magna enim commodo turpis.<br>

                    <br>

                    Aenean vitae ullamcorper lacus. Nullam ultrices magna vel ipsum pulvinar, sed porta orci sagittis.
                    Aliquam ut consectetur turpis. Curabitur eget massa sit amet diam placerat iaculis a nec quam. Ut
                    dignissim, mi nec malesuada iaculis, nisl arcu egestas tortor, vitae vehicula libero nisl vitae
                    libero. Nam nibh est, mattis eget nulla fringilla, porta ullamcorper elit. Morbi pellentesque
                    feugiat augue id luctus.<br>
                </div>
                <div>
                    <input id="termCond" type="checkbox">
                    <label>He leído y acepto los terminos y condiciones</label>
                </div>
            </div>

            <div class="mb-5">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <a id="btnPagar" class="boton">Pagar</a>
                    </div>
                    <div class="col-2">
                        <a class="boton-negativo" href="../index.php">Cancelar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer>
        <p>&copy; 2025 Reservas Municipales.</p>
    </footer>

</html>
