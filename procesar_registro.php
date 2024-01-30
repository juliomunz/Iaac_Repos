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

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$rut = $_POST['rut'];
$direccion = $_POST['direccion'];
$carrera = $_POST['carrera'];
$fecha = $_POST['fecha'];

// Insertar datos en la base de datos
$sql = "INSERT INTO estudiantes (nombre, apellido, rut, direccion, carrera, fecha) VALUES ('$nombre', '$apellido', '$rut', '$direccion', '$carrera', '$fecha')";

// Ejecutar la consulta y verificar si fue exitosa
if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error al registrar: " . $conexion->error;
}

$conexion->close();
?>

<p><a href="index.html">Registrar un nuevo estudiante</a></p>
