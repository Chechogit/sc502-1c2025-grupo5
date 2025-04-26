<?php
session_start();
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "admin", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "mensaje" => "Error de conexión con la base de datos."]);
    exit;
}

$cedula = $_POST['cedula'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($cedula) || empty($password)) {
    echo json_encode(["success" => false, "mensaje" => "Debe completar ambos campos."]);
    exit;
}

$stmt = $conexion->prepare("SELECT id, nombre, clave FROM usuarios WHERE cedula = ?");
$stmt->bind_param("s", $cedula);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo json_encode(["success" => false, "mensaje" => "Cédula no registrada."]);
    exit;
}

$stmt->bind_result($id, $nombre, $claveHash);
$stmt->fetch();

if (password_verify($password, $claveHash)) {
    $_SESSION['usuario_id'] = $id;
    $_SESSION['usuario_nombre'] = $nombre;
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "mensaje" => "Contraseña incorrecta."]);
}
?>