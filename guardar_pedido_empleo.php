<?php

// Incluir el archivo de conexión
include('conexion.php');
include 'bad_words.php';

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$nombre = $_POST['nombre'];
$gradest = $_POST['gradest'];
$mini_cv = $_POST['mini_cv'];
$remuneracion = $_POST['remuneracion'];
$contacto = $_POST['contacto'];

// Validar contra palabras prohibidas
$contenido = $titulo . ' ' . $nombre . ' ' . $gradest . ' ' . $mini_cv . ' ' . $remuneracion . ' ' . $contacto;

foreach ($badWords as $badWord) {
  if (stripos($contenido, $badWord) !== false) {
    // Palabra prohibida encontrada, mostrar un mensaje de error o tomar alguna acción
    die('Lo sentimos, el contenido contiene palabras prohibidas.');
  }
}

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO pedidos (titulo, nombre, gradest, mini_cv, remuneracion, contacto) VALUES ('$titulo', '$nombre', '$gradest', '$mini_cv', '$remuneracion', '$contacto')";

// Ejecutar la consulta y verificar si fue exitosa
if ($conexion->query($sql) === TRUE) {
  echo "El pedido de empleo ha sido guardado exitosamente";
} else {
  echo "Error al guardar el pedido de empleo: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
$conexion->close();

// Esperar 1 segundos antes de redirigir al usuario
sleep(1);

// Redirigir al usuario a la página de inicio
header('Location: index.html');
exit;


?>
