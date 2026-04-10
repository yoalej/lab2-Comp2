<?php
session_start();
require 'conexion.php';

$correo = $_POST['correo'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = ?");
$stmt->execute([$correo]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['usuario'] = $user['nombre'];
    header("Location: principal.php");
} else {
    echo "Credenciales incorrectas <a href='index.php'>Volver</a>";
}
?>