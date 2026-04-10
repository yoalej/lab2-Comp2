<?php
include('conexion.php');
session_start();

if (!isset($_SESSION['logueado'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Datos</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['logueado']; ?></h1>
    <a href="salir.php">Cerrar Sesión</a>

    <h3>Agregar Nuevo Estudiante</h3>
    <form action="guardar.php" method="POST">
        <input type="text" name="nom" placeholder="Nombre Completo" required>
        <input type="text" name="car" placeholder="Carrera" required>
        <button type="submit">Guardar</button>
    </form>

    <hr>

    <h3>Lista de Estudiantes</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Carrera</th>
        </tr>
        <?php
        $sql = "SELECT * FROM estudiantes WHERE nombre_completo IS NOT NULL";
        $res = mysqli_query($conexion, $sql);
        while ($fila = mysqli_fetch_array($res)) {
            echo "<tr>
                    <td>{$fila['id']}</td>
                    <td>{$fila['nombre_completo']}</td>
                    <td>{$fila['carrera']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>