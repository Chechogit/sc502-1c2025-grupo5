<?php

Function db_conexion() {
    $server_name = 'localhost'; 
    $user = 'root'; 
    $password = ''; 
    $db_name = 'municipalidad_recreativas'; 

    $conexion = mysqli_connect( $server_name, $user, $password, $db_name );

    if ( $conexion->connect_error ) {
        die( 'Conexión fallida: ' . $conexion->connect_error);
    }

    return $conexion;
}
$conexion = db_conexion(); 

?>