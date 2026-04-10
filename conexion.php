<?php
$host = 'localhost';
$db   = 'lab2_comp2';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear tabla de usuarios si no existe
    $pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        correo VARCHAR(150) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        creado DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    // Crear tabla de estudiantes si no existe
    $pdo->exec("CREATE TABLE IF NOT EXISTS estudiantes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        carnet VARCHAR(30) NOT NULL UNIQUE,
        carrera VARCHAR(100) NOT NULL,
        edad INT NOT NULL,
        fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    // Usuario pre-registrado
    $stmt = $pdo->query("SELECT COUNT(*) FROM usuarios");
    if ($stmt->fetchColumn() == 0) {
        $defaultPassword = password_hash('Lab2026', PASSWORD_DEFAULT);
        $pdo->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)")
            ->execute(['Administrador', 'admin@lab2.com', $defaultPassword]);
    }
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>