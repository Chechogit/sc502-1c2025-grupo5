<?php
header('Content-Type: application/json');
$conexion = new mysqli("localhost", "root", "admin", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "mensaje" => "Error de conexión"]);
    exit;
}

$cedula = $_POST['cedula'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($cedula) || empty($nombre) || empty($email)) {
    echo json_encode(["success" => false, "mensaje" => "Todos los campos menos la contraseña son obligatorios."]);
    exit;
}

if (!empty($password)) {
    $claveHash = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, correo = ?, clave = ? WHERE cedula = ?");
    $stmt->bind_param("ssss", $nombre, $email, $claveHash, $cedula);
} else {
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, correo = ? WHERE cedula = ?");
    $stmt->bind_param("sss", $nombre, $email, $cedula);
}

if ($stmt->execute()) {
    echo json_encode(["success" => true, "mensaje" => "Usuario actualizado correctamente."]);
} else {
    echo json_encode(["success" => false, "mensaje" => "Error al actualizar el usuario."]);
}

$stmt->close();
$conexion->close();
