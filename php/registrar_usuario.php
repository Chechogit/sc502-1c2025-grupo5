<?php

require '../config/conexion.php';

//Obtener datos del formulario
$nombre = trim($_POST['nombreUsuario']);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$contrasena = $_POST['password'];

//Si los campos están vacios se mostrará un mensaje
if (empty($nombre) || empty($email) || empty($contrasena)) {
    die("Todos los campos son obligatorios.");
}


//Verificar si el usuario o el correo ya existen
$stmt = $conexion->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    die("El correo electrónico ya está registrado.");
}
$stmt->close();


//Encriptar la contraseña
$hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

//Declarar el script para agregar el usuario en la tabla
$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, contrasena, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $hash_contrasena, $email);

//Ejecutar el script
if ($stmt->execute()) {
    header("Location: ../pages/login.php?mensaje=registrado");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

//Cierra la conexión
$stmt->close();
$conexion->close();
?>