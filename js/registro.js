$(document).ready(function () {
    let cedulaValida = false;

    // Autocompletar datos con API de cédulas
    $('#cedula').on('blur', function () {
        const cedula = $(this).val().trim();

        if (cedula !== '') {
            // Verificar si la cédula ya existe en la base de datos
            $.post('/sc502-1c2025-grupo5/php/comprobarCedula.php', { cedula }, function (respuesta) {
                if (respuesta.success && respuesta.existe) {
                    cedulaValida = false;
                    alert('Esta cédula ya está registrada.');
                } else {
                    cedulaValida = true;

                    // Buscar info en API de cédulas
                    $.get(`https://apis.gometa.org/cedulas/${cedula}`, function (data) {
                        if (data && data.results && data.results.length > 0) {
                            const persona = data.results[0];
                            const nombre = persona.firstname1 ?? '';
                            const segundoNombre = persona.firstname2 ?? '';
                            const apellido1 = persona.lastname1 ?? '';
                            const apellido2 = persona.lastname2 ?? '';

                            $('#nombre').val(nombre + (segundoNombre ? ' ' + segundoNombre : ''));
                            $('#apellido1').val(apellido1);
                            $('#apellido2').val(apellido2);
                        } else {
                            alert('La cédula no fue encontrada en el API.');
                        }
                    }).fail(function () {
                        alert('Error al consultar el API de cédulas.');
                    });
                }
            }, 'json');
        }
    });

    // Envío del formulario
    $('#form-registro').on('submit', function (e) {
        e.preventDefault();

        if (!cedulaValida) {
            alert('La cédula ingresada ya está registrada o no ha sido verificada.');
            return;
        }

        const formData = {
            cedula: $('#cedula').val(),
            nombre: $('#nombre').val(),
            apellido1: $('#apellido1').val(),
            apellido2: $('#apellido2').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.ajax({            url: '/sc502-1c2025-grupo5/php/realizarRegistro.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (respuesta) {
                alert(respuesta.mensaje);
                if (respuesta.success) {
                    window.location.href = 'login.php';
                }
            },
            error: function () {
                alert('Error en la conexión con el servidor.');
            }
        });
    });
});
