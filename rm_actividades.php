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

$sql = "SELECT * FROM actividades";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividades</title>
    <link rel="stylesheet" href="rm_styles.css">
</head>
<body>
<h1>Actividades</h1>
<nav class="navbar">
        <div class="user-info">
            <img src="img/user.png" alt="Usuario" width="30">
            <?php echo $nombre_usuario; ?>
        </div>
    </nav>



    <br>
    <div class="activities-container">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="activity-card">
                <h3><?php echo $row['nombre']; ?></h3>
                <p>Costo: <?php echo $row['costo']; ?> Bs</p>
                <p>Fecha: <?php echo $row['fecha']; ?></p>
                <p>Hora: <?php echo $row['horario']; ?></p>
                <form action="rm_inscribir.php" method="post">
                    <input type="hidden" name="id_acti" value="<?php echo $row['id_acti']; ?>">
                    <button type="submit">Inscribirme</button>
                </form>
            </div>
        <?php } ?>
    </div>
    <button onclick="window.location.href='rm_mis_inscripciones.php'">Mis Inscripciones</button>
    <button onclick="window.location.href='rm_cerrar_sesion.php'">Cerrar Sesión</button>
</body>
</html>

<?php
$conn->close();
?>
