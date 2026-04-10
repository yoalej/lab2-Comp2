<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Registro de Estudiantes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>🔑 Login - Lab 2</h1>
        <form action="validar.php" method="POST">
            <input type="email" name="correo" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>Usuario de prueba: <strong>admin@lab2.com</strong></p>
        <p>Contraseña: <strong>Lab2026</strong></p>
        <p>¿No tienes cuenta? <a href="principal.php?registro=1">Regístrate aquí</a></p>
    </div>
</body>
</html>