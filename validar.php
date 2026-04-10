<?php
include('conexion.php');
session_start();

$user = $_POST['usuario'];
$pass = $_POST['clave'];

$consulta = "SELECT * FROM estudiantes WHERE usuario = '$user' AND clave = '$pass'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['logueado'] = $user;
    header("Location: principal.php");
} else {
    echo "Usuario o clave incorrectos. <a href='index.php'>Intentar de nuevo</a>";
}
?>
