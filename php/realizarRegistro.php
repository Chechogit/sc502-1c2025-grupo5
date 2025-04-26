<?php
header('Content-Type: application/json');

$conexion = new mysqli("localhost", "root", "admin", "municipalidad"); // O usa 'root', 'root' si así es tu XAMPP

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

$nombreCompleto = $nombre . ' ' . $apellido1 . ' ' . $apellido2;
$claveHash = password_hash($password, PASSWORD_BCRYPT);

// Registrar el nuevo usuario
$stmt = $conexion->prepare("INSERT INTO usuarios (cedula, nombre, correo, clave) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $cedula, $nombreCompleto, $email, $claveHash);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "mensaje" => "Registro exitoso."]);
} else {
    echo json_encode(["success" => false, "mensaje" => "Error al registrar usuario."]);
}
?>
