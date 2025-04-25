$(document).ready(function () {
    // 1. Cargar la lista de amenidades
    $.ajax({
        url: '/sc502-1c2025-grupo5/php/listarAmenidades.php',
        type: 'GET',
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success) {
                let html = '';
                respuesta.datos.forEach(amenidad => {
                    html += `
                        <div class="amenidad-card" id="amenidad-${amenidad.id}">
                            <img src="${amenidad.imagen_url}" alt="Imagen de ${amenidad.nombre}" class="amenidad-image">
                            <div class="card-body">
                                <h3 class="amenidad-title">${amenidad.nombre}</h3>
                                <p><strong>Descripción:</strong> ${amenidad.descripcion}</p>
                                <p><strong>Ubicación:</strong> ${amenidad.ubicacion}</p>
                                <p><strong>Disponible:</strong> ${amenidad.disponible == 1 ? 'Sí' : 'No'}</p>
                                <p><strong>Reservado:</strong> ${amenidad.reservado == 1 ? 'Sí' : 'No'}</p>
                                <div class="card-actions">
                                    <a href="editarAmenidad.php?id=${amenidad.id}" class="btn">Editar</a>
                                    <button class="btn eliminar-amenidad" data-id="${amenidad.id}">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#listaAmenidades').html(html);
            } else {
                $('#listaAmenidades').html('<p>No se pudieron cargar las amenidades.</p>');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error en AJAX:", status, error);
            $('#listaAmenidades').html('<p>Error al conectarse con el servidor.</p>');
        }
    });

    // 2. Eliminar amenidad por AJAX
    $(document).on('click', '.eliminar-amenidad', function () {
        const idAmenidad = $(this).data('id');
        console.log("ID a eliminar:", idAmenidad);

        if (confirm('¿Estás seguro de eliminar esta amenidad?')) {
            $.ajax({
                url: '/sc502-1c2025-grupo5/php/eliminarAmenidad.php',
                type: 'POST',
                data: { id: idAmenidad },
                dataType: 'json',
                success: function (respuesta) {
                    if (respuesta.success) {
                        // Elimina el card de la amenidad directamente (sin recargar toda la página)
                        $(`#amenidad-${idAmenidad}`).fadeOut(500, function () {
                            $(this).remove();
                        });
                    } else {
                        alert('Error: ' + respuesta.mensaje);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error en AJAX:", status, error);
                    alert('Error al conectar con el servidor.');
                }
            });
        }
    });
});
