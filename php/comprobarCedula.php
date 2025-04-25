<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "admin", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "mensaje" => "Error de conexión"]);
    exit;
}

$cedula = $_POST['cedula'] ?? '';

if (empty($cedula)) {
    echo json_encode(["success" => false, "mensaje" => "Cédula no proporcionada"]);
    exit;
}

$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE cedula = ?");
$stmt->bind_param("s", $cedula);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(["success" => true, "existe" => true]);
} else {
    echo json_encode(["success" => true, "existe" => false]);
}

$stmt->close();
$conexion->close();
