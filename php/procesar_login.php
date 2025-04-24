<?php
session_start();
require '../config/conexion.php';

//Obtener los datos del formulario
$email = trim($_POST['email']);
$contrasena = $_POST['password'];

//Validar que no estén vacíos
if (empty($email) || empty($contrasena)) {
    header("Location: login.php?error=Campos vacíos");
    exit();
}

//Buscar el usuario por correo
$stmt = $conexion->prepare("SELECT id_usuario, nombre, contrasena, id_estado FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($contrasena, $usuario['contrasena'])) {
        if ($usuario['id_estado'] != 1) {
            header("Location: login.php?error=Usuario inactivo");
            exit();
        }

        //Guardar sesión
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre'] = $usuario['nombre'];

        //Actualizar último ingreso
        $update = $conexion->prepare("UPDATE usuarios SET ultimo_ingreso = NOW() WHERE id_usuario = ?");
        $update->bind_param("i", $usuario['id_usuario']);
        $update->execute();
        $update->close();

        //Redirigir al dashboard
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: login.php?error=Contraseña incorrecta");
        exit();
    }
} else {
    header("Location: login.php?error=Correo no registrado");
    exit();
}
?>