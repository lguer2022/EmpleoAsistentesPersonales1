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
            <li><a href="recuperar_pedidos_empleo.php">Pedidos de empleo</a></li>
            <li><a href="recupera_empleos_ofrecidos.php">Empleos ofrecidos</a></li>
            <li><a href="registro.html">Registrate</a></li>
            <li><a href="iniciosesion.html">Log In</a></li>
            <li><a href="index.html">Log Out</a></li>
        </ul>
    </nav>
    <main>
        <h1>Pedidos de Empleo - Estudiantes que ofrecen sus servicios</h1>
        <h2>Aquí los y las estudiantes (o graduados/as) publican sus servicios para vincular con empresas interesadas en sus perfiles</h2>

        <table class="table">

        
        <?php
// Conectar a la base de datos
//require_once 'conexion.php';
include('conexion.php');
// Consultar los registros de la tabla "pedidos"
$query = "SELECT * FROM pedidos";
$resultado = mysqli_query($conexion, $query);

// Mostrar los registros en pantalla
if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr><th>Titulo</th><th>Nombre</th><th>Gradest</th><th>Mini CV</th><th>Remuneracion</th><th>Contacto</th></tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila["titulo"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["gradest"] . "</td>";
        echo "<td>" . $fila["mini_cv"] . "</td>";
        echo "<td>" . $fila["remuneracion"] . "</td>";
        echo "<td>" . $fila["contacto"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros en la tabla.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>


<footer>
    <p>&copy; 2023 Leandro Guerschberg. Todos los derechos reservados.</p>
</footer>
