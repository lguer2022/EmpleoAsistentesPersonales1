<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuidado123";

// Crear la conexión
$conexion = mysqli_connect($servername, $username, $password, $dbname);

// Chequear la conexión
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}
echo "Conexión exitosa";
?>
