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

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "base2");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario_id = $_SESSION['usuario_id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $stmt = $conn->prepare("INSERT INTO tareas (usuario_id, titulo, descripcion) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $usuario_id, $titulo, $descripcion);

        if ($stmt->execute()) {
            echo "Tarea creada.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
?>
<hr>
<br>
<a href="tareas.php">Ver tareas</a>
<br>
<a href="logout.php">Cerrar sesion</a>
</body>
</html>