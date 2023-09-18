<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
    <title>Portal de Empleo para Asistentes Personales</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = yes, width = device-width">

</head>

<body>
    <header>
        <img src="img/img1.png" alt="Logo del portal de empleo">
        <h1>Portal de Empleo para Asistentes Personales</h1>


        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {

                $('nav ul li > a:not(:only-child)').click(function (e) {
                    $(this).siblings('.nav-submenu').toggle();
                    $('.nav-submenu').not($(this).siblings()).hide();
                    e.stopPropagation();
                });

                $('html').click(function () {
                    $('.nav-submenu').hide();
                });

                $('#nav-boton').click(function () {
                    $('nav ul').toggle()
                    $('#nav-boton').toggleClass("activo");
                })

            });

        </script>

    </header>

    <nav>
        <div class="nav-movil">
            <a id="nav-boton" href="#!">
                <span></span>
            </a>
        </div>
        <ul class="nav-menu">
            <li><a href="nuevospedidos.html">Inicio</a></li>
            <li><a href="recuperar_pedidos_empleo1.php">Pedidos de empleo</a></li>
            <li><a href="ingresar_pedido_empleo.html">Ingresar un pedido de empleo</a></li>
            <li><a href="recupera_empleos_ofrecidos1.php">Empleos ofrecidos</a></li>
            <li><a href="ofrecer_nuevo_empleo.html">Ofrecer un nuevo empleo</a></li>
            <li><a href="registro.html">Registrate</a></li>
            <li><a href="iniciosesion.html">Log In</a></li>
            <li><a href="index.html">Log Out</a></li>
        </ul>
    </nav>
    <main>
        <h1>Empleos Ofrecidos</h1>
        <h2>Aquí las empresas y personas interesadas publican los empleos ofrecidos</h2>

        <table class="table">
        
<?php
// Incluir el archivo de conexión a la base de datos
include("conexion.php");

// Realizar la consulta a la tabla "ofertas"
$resultado = mysqli_query($conexion, "SELECT * FROM ofertas ORDER BY fecha_publicacion DESC");

// Comprobar si la consulta se ejecutó correctamente
if (!$resultado) {
    die("La consulta a la base de datos ha fallado: " . mysqli_error($conexion));
}

// Mostrar los resultados en una tabla HTML
echo "<table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Empresa</th>
                <th>Ciudad</th>
                <th>Cargo</th>
                <th>Fecha de publicación</th>
                <th>Referencia</th>
            </tr>
        </thead>
        <tbody>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila['titulo'] . "</td>";
    echo "<td>" . $fila['empresa'] . "</td>";
    echo "<td>" . $fila['ciudad'] . "</td>";
    echo "<td>" . $fila['cargo'] . "</td>";
    echo "<td>" . $fila['fecha_publicacion'] . "</td>";
    echo "<td>" . $fila['referencia'] . "</td>";
    echo "</tr>";
}

echo "</tbody></table>";

// Liberar los resultados de la memoria
mysqli_free_result($resultado);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>


<footer>
    <p>&copy; 2023 Leandro Guerschberg. Todos los derechos reservados.</p>
</footer>
