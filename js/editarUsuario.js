$(document).ready(function () {
    // Buscar usuario al perder foco de la cédula
    $('#cedula').on('blur', function () {
        const cedula = $(this).val().trim();

        if (cedula !== '') {
            $.post('/sc502-1c2025-grupo5/php/buscarUsuario.php', { cedula }, function (respuesta) {
                if (respuesta.success && respuesta.usuario) {
                    $('#nombre').val(respuesta.usuario.nombre);
                    $('#email').val(respuesta.usuario.correo);
                } else {
                    alert(respuesta.mensaje || 'Usuario no encontrado.');
                }
            }, 'json');
        }
    });

    // Enviar cambios
    $('#form-modificar').on('submit', function (e) {
        e.preventDefault();

        const formData = {
            cedula: $('#cedula').val(),
            nombre: $('#nombre').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.post('/sc502-1c2025-grupo5/php/editarUsuario.php', formData, function (respuesta) {
            alert(respuesta.mensaje);
        }, 'json').fail(function () {
            alert('Error al comunicarse con el servidor.');
        });
    });
});
