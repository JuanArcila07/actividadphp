<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Marcar como Completado</th>
            </tr>
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
                    $estado = ($row['completada'] == 1) ? "Completado" : "Pendiente";

                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['titulo']}</td>";
                    echo "<td>{$row['descripcion']}</td>";
                    echo "<td>{$estado}</td>";
                    echo "<td><a href='editar_tarea.php?id={$row['id']}'>Editar</a></td>";
                    echo "<td><a href='eliminar_tarea.php?id={$row['id']}'>Eliminar</a></td>";
                    echo "<td><a href='completar_tarea.php?id={$row['id']}'>Marcar como Completado</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
    <hr>
    <a href="nueva_tarea.php">Crear nueva tarea</a> 
    <br>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>