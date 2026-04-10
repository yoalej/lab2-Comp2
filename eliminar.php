<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

require 'conexion.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: principal.php');
    exit;
}

$id = intval($_GET['id']);
$stmt = $pdo->prepare('DELETE FROM estudiantes WHERE id = ?');
$stmt->execute([$id]);

header('Location: principal.php');
exit;
