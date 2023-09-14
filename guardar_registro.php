
<?php
// Obtener los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$celular = $_POST['celular'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$email = $_POST['email'];

// Conexión a la base de datos
include('conexion.php');

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Consulta para insertar los datos en la tabla usuarios
$sql = "INSERT INTO usuarios (nombre, apellido, dni, celular, nombre_usuario, contraseña, email) VALUES ('$nombre', '$apellido', '$dni', '$celular', '$usuario', '$contraseña', '$email')";

if (mysqli_query($conexion, $sql)) {
    echo "Registro exitoso";
    header("Location: iniciosesion.html");
} else {
    echo "Error al registrar el usuario: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

