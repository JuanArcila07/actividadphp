<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Editar tarea</h1>
<hr>
<br>
<?php
    $conn = new mysqli("localhost", "root", "", "base2");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT titulo, descripcion FROM tareas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($titulo, $descripcion);
    $stmt->fetch();
    $stmt->close();
?>

<form method="POST" action="editar_tarea1.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="titulo" placeholder="Título" required value="<?php echo htmlspecialchars($titulo); ?>">
    <textarea name="descripcion" placeholder="Descripción"><?php echo htmlspecialchars($descripcion); ?></textarea>
    <button type="submit">Actualizar Tarea</button>
</form>

</body>
</html>