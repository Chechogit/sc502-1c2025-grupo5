<?php
header('Content-Type: application/json');
$conexion = new mysqli("localhost", "root", "admin", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "mensaje" => "Error de conexión"]);
    exit;
}

$id = $_POST['id'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$ubicacion = $_POST['ubicacion'] ?? '';
$disponible = $_POST['disponible'] ?? '';
$reservado = $_POST['reservado'] ?? '';

if (!$id || !$nombre || !$descripcion || !$ubicacion) {
    echo json_encode(["success" => false, "mensaje" => "Faltan campos obligatorios."]);
    exit;
}

$stmt = $conexion->prepare("UPDATE amenidades SET nombre = ?, descripcion = ?, ubicacion = ?, disponible = ?, reservado = ? WHERE id = ?");
$stmt->bind_param("sssiii", $nombre, $descripcion, $ubicacion, $disponible, $reservado, $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "mensaje" => "Amenidad actualizada correctamente."]);
} else {
    echo json_encode(["success" => false, "mensaje" => "Error al actualizar la amenidad."]);
}

$stmt->close();
$conexion->close();
