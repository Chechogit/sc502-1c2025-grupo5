$(document).ready(function () {
    $('#espacioForm').on('submit', function (e) {
        e.preventDefault();

        const formData = {
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
            ubicacion: $('#ubicacion').val(),
            imagen_url: $('#imagen_url').val(),
            disponible: $('#disponible').is(':checked'),  // checkbox
            reservado: false  // Por defecto, no reservado
        };

        $.ajax({
            url: '/sc502-1c2025-grupo5/php/crearEspacio.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (respuesta) {
                alert(respuesta.mensaje);
                if (respuesta.success) {
                    $('#espacioForm')[0].reset();
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
                console.error(xhr.responseText);
                alert('Error en la conexión con el servidor.');
            }
        });
    });
});