<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="validar.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <br><br>
        <input type="password" name="clave" placeholder="Contraseña" required>
        <br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>