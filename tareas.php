<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "base2");

    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login1.php");
        exit;
    }

    $usuario_id = $_SESSION['usuario_id'];
    $result = $conn->query("SELECT * FROM tareas WHERE usuario_id = $usuario_id");

    while ($row = $result->fetch_assoc()) {
    echo "<p>";
    echo "<strong>Tarea:</strong> {$row['titulo']}<br>";
    echo "<strong>Descripción:</strong> {$row['descripcion']}<br>";
    echo "<a href='editar_tarea.php?id={$row['id']}'>Editar</a> | ";
    echo "<a href='eliminar_tarea.php?id={$row['id']}'>Eliminar</a> | ";
    echo "<a href='completar_tarea.php?id={$row['id']}'>Marcar como completada</a>";
    echo "</p>";
    }
?>
<hr>
    <a href="nueva_tarea.php">Crear nueva tarea</a> 
    <br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>