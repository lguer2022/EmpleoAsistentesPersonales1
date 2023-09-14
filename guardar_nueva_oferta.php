<?php
include 'conexion.php';
include 'bad_words.php';

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$empresa = $_POST['empresa'];
$ciudad = $_POST['ciudad'];
$cargo = $_POST['cargo'];
$fecha_publicacion = $_POST['fecha_publicacion'];
$referencia = $_POST['referencia'];

// Validar contra palabras prohibidas
$contenido = $titulo . ' ' . $empresa . ' ' . $ciudad . ' ' . $cargo . ' ' . $fecha_publicacion . ' ' . $referencia;

foreach ($badWords as $badWord) {
  if (stripos($contenido, $badWord) !== false) {
    // Palabra prohibida encontrada, mostrar un mensaje de error o tomar alguna acción
    die('Lo sentimos, el contenido contiene palabras prohibidas.');
  }
}


// Preparar la consulta SQL
$sql = "INSERT INTO ofertas (titulo, empresa, ciudad, cargo, fecha_publicacion, referencia) VALUES ('$titulo', '$empresa', '$ciudad', '$cargo', '$fecha_publicacion', '$referencia')";

// Ejecutar la consulta y comprobar si se guardó correctamente
if (mysqli_query($conexion, $sql)) {
  echo "La oferta de empleo se guardó correctamente.";
} else {
  echo "Error: " . mysqli_error($conexion);
}

// Cerrar la conexión con la base de datos
mysqli_close($conexion);

// Esperar 1 segundos antes de redirigir al usuario
sleep(1);

// Redirigir al usuario a la página de inicio
header('Location: index.html');
exit;

?>