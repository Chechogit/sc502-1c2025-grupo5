$(document).ready(function () {

    // Autocompletar datos con API de cédulas
    $('#cedula').on('blur', function () {
        const cedula = $(this).val().trim();

        if (cedula !== '') {
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
                    alert('La cédula no fue encontrada en la base de datos del API.');
                }
            }).fail(function () {
                alert('Error al consultar el API de cédulas.');
            });
        }
    });

    // Envío del formulario de registro
    $('#form-registro').on('submit', function (e) {
        e.preventDefault();

        const formData = {
            cedula: $('#cedula').val(),
            nombre: $('#nombre').val(),
            apellido1: $('#apellido1').val(),
            apellido2: $('#apellido2').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.ajax({
            url: '/sc502-1c2025-grupo5/php/realizarRegistro.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (respuesta) {
                alert(respuesta.mensaje);
                if (respuesta.success) {
                    window.location.href = 'login.html';
                }
            },
            error: function () {
                alert('Error en la conexión con el servidor.');
            }
        });
    });
});
