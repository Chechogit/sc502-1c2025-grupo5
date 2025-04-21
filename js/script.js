document.addEventListener("DOMContentLoaded", function () {

    let reservaciones = [
        {
            "nombreEspacio": "Piscina",
            "nombreUsuario": "Luis Fernandez",
            "fecha": "20/04/2024",
            "hora": "16:30"
        }
    ];

    for (let x in reservaciones) {
        document.getElementById("espacioPago").innerHTML = "Espacio: " + reservaciones[x].nombreEspacio;
        document.getElementById("nombreUsuarioPago").innerHTML = "Nombre: " + reservaciones[x].nombreUsuario;
        document.getElementById("fechaPago").innerHTML = "Fecha: " + reservaciones[x].fecha;
        document.getElementById("horaPago").innerHTML = "Hora: " + reservaciones[x].hora;
    }

    //Ingreso de datos para el pago
    document.getElementById("btnPagar").addEventListener("click", function () {
        let nTarjetaId = document.getElementById("nTarjeta").value;
        let titularTarjetaId = document.getElementById("titularTarjeta").value;
        let fechaExpiracionId = document.getElementById("fechaExpiracion").value;
        let nCvvId = document.getElementById("nCvv").value;
        let terminosCondiciones = document.getElementById("termCond");


        // Condicionales para verificar que se ingresen los datos correctamente
        if (nTarjetaId === "") {

            alert("Por favor ingrese el número de Tarjeta");
            document.getElementById("nTarjeta").style.borderColor = "red";

        } else if (titularTarjetaId === "") {

            document.getElementById("titularTarjeta").style.borderColor = "red";
            alert("Por favor ingrese el nombre del titular de la Tarjeta");

            document.getElementById("titularTarjeta").style.borderColor = "black";
            document.getElementById("fechaExpiracion").style.borderColor = "black";
            document.getElementById("nCvv").style.borderColor = "black";

        } else if (fechaExpiracionId === "") {

            document.getElementById("fechaExpiracion").style.borderColor = "red";
            alert("Por favor ingrese la fecha de expiración de la Tarjeta");

            document.getElementById("nTarjeta").style.borderColor = "black";
            document.getElementById("titularTarjeta").style.borderColor = "black";
            document.getElementById("nCvv").style.borderColor = "black";
            
        } else if (nCvvId === "") {

            document.getElementById("nCvv").style.borderColor = "red";
            alert("Por favor ingrese el código de seguridad de la tarjeta");

            document.getElementById("nTarjeta").style.borderColor = "black";
            document.getElementById("titularTarjeta").style.borderColor = "black";
            document.getElementById("fechaExpiracion").style.borderColor = "black";

        } else if (!terminosCondiciones.checked) {
            document.getElementById("termCond").style.borderColor = "red";
            alert("Por favor acepte los términos y condiciones");

            document.getElementById("nTarjeta").style.borderColor = "black";
            document.getElementById("titularTarjeta").style.borderColor = "black";
            document.getElementById("fechaExpiracion").style.borderColor = "black";
            document.getElementById("nCvv").style.borderColor = "black";

        } else {
            alert("Datos correctos, procesando el pago...");


            //Los input se colorean de negro
            document.getElementById("nTarjeta").style.borderColor = "black";
            document.getElementById("titularTarjeta").style.borderColor = "black";
            document.getElementById("fechaExpiracion").style.borderColor = "black";
            document.getElementById("nCvv").style.borderColor = "black";
            document.getElementById("termCond").style.borderColor = "black";

            alert("Pago realizado con exito, se ha reservado correctamente la actividad");
            window.location.href = "index.php";

        }

    });

    var cvvQueEs = document.getElementById("cvvQueEs");
    var imgCVV = document.getElementById("imgCVV");

    cvvQueEs.addEventListener("mouseover", function() {
        imgCVV.style.display = "block";
    });

    cvvQueEs.addEventListener("mouseout", function() {
        imgCVV.style.display = "none";
    });
})

document.addEventListener('DOMContentLoaded', function() {
    // Selector de horas con cálculo de precio
    const timeSlots = document.querySelectorAll('.time-slot:not(.unavailable)');
    const precioPorHora = 8000; // Precio base (puedes cambiarlo por espacio)
    const totalElement = document.querySelector('.total-precio');
    
    timeSlots.forEach(slot => {
        slot.addEventListener('click', function() {
            // Remover selección previa
            document.querySelectorAll('.time-slot.selected').forEach(s => {
                s.classList.remove('selected');
            });
            
            // Seleccionar nuevo slot
            this.classList.add('selected');
            
            // Calcular precio
            const horasSeleccionadas = document.querySelectorAll('.time-slot.selected').length;
            const total = horasSeleccionadas * precioPorHora;
            
            // Actualizar UI
            document.getElementById('horas-seleccionadas').textContent = horasSeleccionadas;
            totalElement.textContent = `₡${total.toLocaleString()}`;
        });
    });


    // Modal de reserva
    const reservaModal = document.getElementById('reservaModal');
    reservaModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const espacio = button.getAttribute('data-espacio');
        const precio = button.closest('.card').querySelector('.precio-espacio').textContent;
        
        document.getElementById('espacio').value = espacio;
        document.getElementById('precio-base').textContent = precio;
        document.getElementById('horas-seleccionadas').textContent = '0';
        document.querySelector('.total-precio').textContent = '₡0';
    });
});

    flatpickr("#fechaReserva", {
        locale: "es",
        minDate: "today",
        dateFormat: "d/m/Y",
        disable: [
            function(date) {
                return (date.getDay() === 0);
            }
        ]
    });
