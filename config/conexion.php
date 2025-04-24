<?php

//Se realiza la conexión a la base de datos
$host = "localhost";
$user = "root"; //Esto lo deben cambiar dependiendo de como lo hayan puesto ustedes
$password = "admin"; //Esto lo deben cambiar dependiendo de como lo hayan puesto ustedes
$database = "municipalidad_recreativas";

try {
    $conexion = new mysqli($host, $user, $password, $database);
} catch (mysqli_sql_exception $e) {
    die("Error de conexión: " . $e->getMessage());
}