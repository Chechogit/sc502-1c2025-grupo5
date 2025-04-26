
$(document).ready(function () {
    $('#form-login').on('submit', function (e) {
        e.preventDefault();

        const cedula = $('#cedula').val().trim();
        const password = $('#password').val().trim();

        if (cedula === '' || password === '') {
            alert('Por favor, complete ambos campos.');
            return;
        }

        $.ajax({
            url: '/sc502-1c2025-grupo5/php/login.php',
            type: 'POST',
            dataType: 'json',
            data: { cedula, password },
            success: function (respuesta) {
                if (respuesta.success) {
                    alert('Inicio de sesión exitoso');
                    window.location.href = '/sc502-1c2025-grupo5/index.PHP';
                } else {
                    alert(respuesta.mensaje);
                }
            },
            error: function () {
                alert('Error al conectar con el servidor.');
            }
        });
    });
});