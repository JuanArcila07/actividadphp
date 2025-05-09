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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $stmt = $conn->prepare("UPDATE tareas SET titulo = ?, descripcion = ? WHERE id = ?");
        $stmt->bind_param("ssi", $titulo, $descripcion, $id);

        if ($stmt->execute()) {
            echo "Tarea actualizada.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
?>
<hr>
<br>
<a href="tareas.php">Ver tareas</a>
</body>
</html>