<?php
include('conexion.php');

// Recibimos los datos del formulario
$nombre = $_POST['nom'];
$carrera = $_POST['car'];

// VALIDACIÓN: Solo inserta si AMBOS campos tienen texto
if (!empty(trim($nombre)) && !empty(trim($carrera))) {
    $sql = "INSERT INTO estudiantes (nombre_completo, carrera) VALUES ('$nombre', '$carrera')";
    mysqli_query($conexion, $sql);
}

// Redirigir siempre al panel principal
header("Location: principal.php");
?>