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

    $id = $_GET['id'];
    $conn->query("UPDATE tareas SET completada = TRUE WHERE id = $id");

    header("Location: tareas.php");
    exit;
?>

</body>
</html>