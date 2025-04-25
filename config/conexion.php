<?php
$hostname = "localhost";
$username = "root";
$password = "admin";
$database = "municipalidad";

$conn = new mysqli($hostname, $username, $password, $database);

if($conn->connect_error){
    echo "Error de conexión: " . $conn->connect_error;
}
?>