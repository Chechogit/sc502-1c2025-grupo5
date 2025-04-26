<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "admin", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "mensaje" => "Error en la conexión"]);
    exit;
}

// CORREGIDO: leer ID desde POST, no GET
$id = $_POST['id'] ?? '';

if (empty($id)) {
    echo json_encode(["success" => false, "mensaje" => "ID no proporcionado"]);
    exit;
}

$stmt = $conexion->prepare("DELETE FROM amenidades WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "mensaje" => "Amenidad eliminada"]);
} else {
    echo json_encode(["success" => false, "mensaje" => "Error al eliminar: " . $stmt->error]);
}

$stmt->close();
$conexion->close();
?>
