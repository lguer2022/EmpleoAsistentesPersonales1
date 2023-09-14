<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <title>Portal de Empleo para Asistentes Personales</title>
</head>

<body>
    <header>
        <img src="img/img1.png" alt="Logo del portal de empleo">
        <h1>Portal de Empleo para Asistentes Personales</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="iniciosesion.html">Inicio</a></li>
            <li><a href="recuperar_pedidos_empleo.php">Pedidos de empleo</a></li>
            <li><a href="ingresar_pedido_empleo.html">Ingresar un pedido de empleo</a></li>
            <li><a href="recupera_empleos_ofrecidos.php">Empleos ofrecidos</a></li>
            <li><a href="ofrecer_nuevo_empleo.html">Ofrecer un nuevo empleo</a></li>
        </ul>
    </nav>
    


<?php
// Obtener los datos enviados desde el formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Conexión a la base de datos
include("conexion.php");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contraseña = '$contraseña'";
$resultado = mysqli_query($conexion, $sql);

// Verificar si se encontró un registro coincidente
if (mysqli_num_rows($resultado) == 1) {
    // Inicio de sesión exitoso
    // Redireccionar a la página de nuevos pedidos
    header("Location: nuevospedidos.html");
    exit();
} else {
    // Credenciales inválidas
    echo "Usuario o contraseña incorrectos";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
