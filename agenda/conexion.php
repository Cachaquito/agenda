<?php
$host = "localhost"; // luego cambiarás a 192.168.1.39 en el servidor
$user = "root";      // o tu usuario real en MariaDB
$pass = "";
$db   = "agenda";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
