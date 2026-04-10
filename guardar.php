<?php
include('conexion.php');

$nombre = $_POST['nom'];
$carrera = $_POST['car'];

// Validación: que no estén vacíos (Punto 3 del lab)
if (!empty($nombre) && !empty($carrera)) {
    $sql = "INSERT INTO estudiantes (nombre_completo, carrera) VALUES ('$nombre', '$carrera')";
    mysqli_query($conexion, $sql);
}

header("Location: principal.php");
?>