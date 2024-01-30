<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "registrodb";

$conexion = new mysqli($server, $user, $password, $db);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$sql = "SELECT * FROM estudiantes";
$result = $conexion->query($sql);

?>

<body>

    <div class="container mt-4">
        <h2 class="text-center">Lista de Estudiantes</h2>
        
        <?php
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead><tr><th>Nombre</th><th>Apellidos</th><th>Rut</th><th>Dirección</th><th>Carrera</th><th>Inicio Perido Académico</th></tr></thead>";
            echo "<tbody>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["apellido"] . "</td>";
                echo "<td>" . $row["rut"] . "</td>";
                echo "<td>" . $row["direccion"] . "</td>";
                echo "<td>" . $row["carrera"] . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='text-center'>No hay estudiantes registrados en la base de datos.</p>";
        }
        $conexion->close();
        ?>

    </div>
</body>
<br>
<p><a href="index.html">Volver</a></p>
</html>
