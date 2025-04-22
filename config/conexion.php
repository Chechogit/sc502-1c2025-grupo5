<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "municipalidad";

$conn = new mysqli($hostname, $username, $password, $database);

if($conn->connect_error){
    echo "Error de conexión: " . $conn->connect_error;
} else {
    echo "Conexión exitosa a la base de datos 'municipalidad'.";
}
?>