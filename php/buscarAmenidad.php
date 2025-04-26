<?php
header('Content-Type: application/json');
$conexion = new mysqli("localhost", "root", "admin", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "mensaje" => "Error de conexión"]);
    exit;
}

$id = $_GET['id'] ?? '';

$stmt = $conexion->prepare("SELECT * FROM amenidades WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $amenidad = $resultado->fetch_assoc();
    echo json_encode(["success" => true, "amenidad" => $amenidad]);
}

$stmt->close();
$conexion->close();