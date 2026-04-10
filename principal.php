<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
require 'conexion.php';

// Si viene del registro
if (isset($_GET['registro'])) {
    echo "<h2>Registro de Nuevo Usuario</h2>";
    echo '<form action="guardar.php?tipo=usuario" method="POST">
            Nombre: <input type="text" name="nombre" required><br>
            Correo: <input type="email" name="correo" required><br>
            Contraseña: <input type="password" name="password" required><br>
            <button type="submit">Registrarse</button>
          </form>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Principal - Registro de Estudiantes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
        <a class="logout" href="salir.php">Cerrar Sesión</a>

        <h2>Agregar Estudiante</h2>
        <form action="guardar.php" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre" required>
            <label>Carnet</label>
            <input type="text" name="carnet" required>
            <label>Carrera</label>
            <input type="text" name="carrera" required>
            <label>Edad</label>
            <input type="number" name="edad" min="1" required>
            <button type="submit">Guardar Estudiante</button>
        </form>

        <h2>Lista de Estudiantes</h2>
        <table>
            <tr><th>Nombre</th><th>Carnet</th><th>Carrera</th><th>Edad</th><th>Fecha</th></tr>
            <?php
            $stmt = $pdo->query("SELECT * FROM estudiantes ORDER BY fecha_registro DESC");
            while ($row = $stmt->fetch()) {
                echo "<tr><td>{$row['nombre']}</td><td>{$row['carnet']}</td><td>{$row['carrera']}</td><td>{$row['edad']}</td><td>{$row['fecha_registro']}</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>