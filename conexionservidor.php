<?php
$servername = "localhost";
$username = "u778877551_senderos";
$password = "xPRESS23";
$dbname = "u778877551_cuidados123";

// Crear la conexión
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Chequear la conexión
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}
echo "Conexión exitosa";
?>