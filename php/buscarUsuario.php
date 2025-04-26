<?php
header('Content-Type: application/json');
$conexion = new mysqli("localhost", "root", "root", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "mensaje" => "Error de conexión"]);
    exit;
}

$cedula = $_POST['cedula'] ?? '';
if (empty($cedula)) {
    echo json_encode(["success" => false, "mensaje" => "Cédula no proporcionada"]);
    exit;
}

$stmt = $conexion->prepare("SELECT nombre, correo FROM usuarios WHERE cedula = ?");
$stmt->bind_param("s", $cedula);
$stmt->execute();
$resultado = $stmt->get_result();

if ($usuario = $resultado->fetch_assoc()) {
    echo json_encode(["success" => true, "usuario" => $usuario]);
} else {
    echo json_encode(["success" => false, "mensaje" => "Usuario no encontrado."]);
}

$stmt->close();
$conexion->close();
