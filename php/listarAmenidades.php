<?php
// Establece la cabecera para que la respuesta sea en formato JSON
header('Content-Type: application/json');

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "admin", "municipalidad");

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener los datos de las amenidades
$sql = "SELECT id, nombre, descripcion, ubicacion, disponible, reservado, imagen_url FROM amenidades";
$resultado = $conexion->query($sql);

// Array para almacenar las amenidades
$amenidades = [];

if ($resultado->num_rows > 0) {
    // Recorre los resultados y los agrega al array
    while ($fila = $resultado->fetch_assoc()) {
        $amenidades[] = $fila;
    }
}

// Envía la respuesta como JSON
echo json_encode(['success' => true, 'datos' => $amenidades]);

// Cierra la conexión
$conexion->close();
?>
