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

    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login1.php");
        exit;
    }

    // Evitar que la página se almacene en caché
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "base2");

    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login1.php");
        exit;
    }

    $id = $_GET['id'];
    $conn->query("DELETE FROM tareas WHERE id = $id");

    header("Location: tareas.php");
    exit;
?>

</body>
</html>