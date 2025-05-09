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
<form method="POST" action="editar_tarea1.php">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="text" name="titulo" placeholder="Título" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <button type="submit">Actualizar Tarea</button>
</form>

</body>
</html>