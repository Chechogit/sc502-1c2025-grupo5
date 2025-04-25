$(document).ready(function () {
    const id = $('#id').val();

    // Cargar datos actuales
    $.get('/sc502-1c2025-grupo5/php/buscarAmenidad.php', { id }, function (respuesta) {
        if (respuesta.success && respuesta.amenidad) {
            $('#nombre').val(respuesta.amenidad.nombre);
            $('#descripcion').val(respuesta.amenidad.descripcion);
            $('#ubicacion').val(respuesta.amenidad.ubicacion);
            $('#disponible').val(respuesta.amenidad.disponible);
            $('#reservado').val(respuesta.amenidad.reservado);
        } else {
            alert(respuesta.mensaje || 'No se encontró la amenidad.');
        }
    }, 'json');

    // Enviar cambios
    $('#form-editar-amenidad').on('submit', function (e) {
        e.preventDefault();

        const formData = {
            id: $('#id').val(),
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
            ubicacion: $('#ubicacion').val(),
            disponible: $('#disponible').val(),
            reservado: $('#reservado').val()
        };

        $.post('/sc502-1c2025-grupo5/php/editarAmenidad.php', formData, function (respuesta) {
            alert(respuesta.mensaje);
        }, 'json').fail(function () {
            alert('Error al comunicarse con el servidor.');
        });
    });
});
