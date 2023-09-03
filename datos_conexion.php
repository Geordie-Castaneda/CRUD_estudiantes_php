<?php
    $db_host = "localhost";
    $db_user = "geordie";
    $db_pass = "admin1234";
    $db_nombre = "db_estudiantes";
    $db_puerto = "3306"; // Cambia esto al puerto que desees utilizar

    $db_conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_nombre, $db_puerto);


    if (!$db_conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

?>