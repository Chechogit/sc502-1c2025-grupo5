<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "admin", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode([
        "success" => false,
        "mensaje" => "Error de conexión a la base de datos: " . $conexion->connect_error
    ]);
    exit;
}

$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$ubicacion = $_POST['ubicacion'] ?? '';
$imagen_url = $_POST['imagen_url'] ?? '';
$disponible = isset($_POST['disponible']) ? 1 : 0;
$reservado = 0;  // Siempre inicia en falso

if (empty($nombre)) {
    echo json_encode(["success" => false, "mensaje" => "El nombre del espacio es obligatorio."]);
    exit;
}

$stmt = $conexion->prepare("INSERT INTO amenidades (nombre, descripcion, ubicacion, disponible, reservado, imagen_url) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiss", $nombre, $descripcion, $ubicacion, $disponible, $reservado, $imagen_url);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "mensaje" => "Espacio creado exitosamente."]);
} else {
    echo json_encode([
        "success" => false,
        "mensaje" => "Error al crear el espacio: " . $stmt->error
    ]);
}
?>