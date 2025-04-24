<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "", "municipalidad");

if ($conexion->connect_error) {
    echo json_encode(["success" => false, "mensaje" => "Error de conexión a la base de datos."]);
    exit;
}

$cedula = $_POST['cedula'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$apellido1 = $_POST['apellido1'] ?? '';
$apellido2 = $_POST['apellido2'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($cedula) || empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) || empty($password)) {
    echo json_encode(["success" => false, "mensaje" => "Todos los campos son obligatorios."]);
    exit;
}

// Verificar si el correo ya está registrado
$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(["success" => false, "mensaje" => "Este correo ya está registrado."]);
    exit;
}

// Insertar usuario (asegúrate que la tabla tenga estas columnas)
$claveHash = password_hash($password, PASSWORD_BCRYPT);
$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, clave) VALUES (?, ?, ?)");
$nombreCompleto = $nombre . ' ' . $apellido1 . ' ' . $apellido2;
$stmt->bind_param("sss", $nombreCompleto, $email, $claveHash);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "mensaje" => "Registro exitoso."]);
} else {
    echo json_encode(["success" => false, "mensaje" => "Error al registrar usuario."]);
}
?>
