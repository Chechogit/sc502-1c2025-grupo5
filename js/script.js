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