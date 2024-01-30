<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Registro - Instituto Andrés Bello</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<?php
// Datos de conexión a la base de datos
$server = "localhost";
$user = "root";
$password = "";
$db = "registrodb";

$conexion = new mysqli($server, $user, $password, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$campo_busqueda = $_GET['campo_busqueda'];

// Consulta SQL para buscar registros por Rut
$sql = "SELECT * FROM estudiantes WHERE rut = '$campo_busqueda'";
$result = $conexion->query($sql);

// Mostrar los resultados de la búsqueda


if ($result->num_rows > 0) {
    echo "<div class='container mx-auto'>";
    echo "<h1 class='text-center'>Resultados de la búsqueda para el Rut: $campo_busqueda</h1>";
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>Nombre</th><th>Apellidos</th><th>Rut</th><th>Dirección</th><th>Carrera</th><th>Inicio Periodo Académico</th></tr></thead>";
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
    echo "</div>";
} else {
    echo "No se encontraron resultados para el Rut: " . $campo_busqueda;
}

$conexion->close();
?>
<br>
<p><a href="index.html">Volver</a></p>
</html>