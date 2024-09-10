<?php
session_start();
include('rm_conexion.php');

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$sql = "SELECT * FROM usuario WHERE usuario='$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($contraseña, $row['contraseña'])) {
        $_SESSION['id_usu'] = $row['id_usu'];
        $_SESSION['usuario'] = $row['usuario'];
        header("Location: rm_actividades.php");
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
$conn->close();
?>
