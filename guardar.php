<?php
session_start();
require 'conexion.php';

if (isset($_GET['tipo']) && $_GET['tipo'] == 'usuario') {
    // Registro de usuario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$nombre, $correo, $pass])) {
        echo "Usuario creado. <a href='index.php'>Ir a login</a>";
    }
} else {
    // Registro de estudiante
    $nombre = trim($_POST['nombre']);
    $carnet = trim($_POST['carnet']);
    $carrera = trim($_POST['carrera']);
    $edad = intval($_POST['edad']);

    // Validación
    if (empty($nombre) || empty($carnet) || empty($carrera) || $edad < 1 || $edad > 120) {
        die("Datos incompletos o inválidos <a href='principal.php'>Volver</a>");
    }

    if (!preg_match('/^[A-Za-z0-9_-]{3,30}$/', $carnet)) {
        die("El carnet debe tener entre 3 y 30 caracteres válidos <a href='principal.php'>Volver</a>");
    }

    $stmt = $pdo->prepare("INSERT INTO estudiantes (nombre, carnet, carrera, edad) VALUES (?, ?, ?, ?)");
    try {
        if ($stmt->execute([$nombre, $carnet, $carrera, $edad])) {
            header("Location: principal.php");
            exit;
        }
    } catch (PDOException $e) {
        if (strpos($e->getMessage(), 'Duplicate') !== false) {
            die("El carnet ya existe. <a href='principal.php'>Volver</a>");
        }
        die("Error al guardar estudiante: " . $e->getMessage());
    }
}
?>