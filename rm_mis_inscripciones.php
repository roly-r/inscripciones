<?php
session_start();
include('rm_conexion.php');

if (!isset($_SESSION['id_usu'])) {
    header("Location: rm_login.php");
    exit();
}

$id_usu = $_SESSION['id_usu'];

$sql_user = "SELECT nombres, primer_apellido, segundo_apellido FROM usuario WHERE id_usu = '$id_usu'";
$result_user = $conn->query($sql_user);
$user = $result_user->fetch_assoc();
$nombre_usuario = $user['nombres'] . ' ' . $user['primer_apellido'] . ' ' . $user['segundo_apellido'];

$sql = "SELECT actividades.nombre, actividades.costo, actividades.fecha, actividades.horario, inscripciones.id
        FROM inscripciones
        JOIN actividades ON inscripciones.id_actividad = actividades.id_acti
        WHERE inscripciones.id_usuario = '$id_usu'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Inscripciones</title>
    <link rel="stylesheet" href="rm_styles.css">
   
</head>
<body>
    <h2>MIS INSCRIPCIONES</h2>
    <nav class="navbar">
        <div class="user-info">
            <img src="img/user.png" alt="Usuario" width="30">
            <?php echo $nombre_usuario; ?>
        </div>
    </nav>
    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Actividad</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $num = 1;
            while($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $num++; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td>
                        <form action="rm_anular_inscripcion.php" method="post">
                            <input type="hidden" name="id_inscripcion" value="<?php echo $row['id']; ?>">
                            <button type="submit">Anular Inscripción</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button onclick="window.location.href='rm_actividades.php'">Actividades</button>
    <button onclick="window.location.href='rm_cerrar_sesion.php'">Cerrar Sesión</button>
</body>
</html>

<?php
$conn->close();
?>
