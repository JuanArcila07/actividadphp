<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $conn = new mysqli("localhost", "root", "", "base2");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        $hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $hash);

        if ($stmt->execute()) {
            echo "Usuario registrado con éxito.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
}
?>
<br>
<a href="login.php">Ir al inicio de Sesion</a>
</body>
</html>