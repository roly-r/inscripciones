<?php
session_start();
include('rm_conexion.php');

if (!isset($_SESSION['id_usu'])) {
    header("Location: rm_login.php");
    exit();
}

$id_usu = $_SESSION['id_usu'];
$id_acti = $_POST['id_acti'];

$sql = "SELECT fecha FROM actividades WHERE id_acti='$id_acti'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['fecha'] < date('Y-m-d')) {
    die("No puedes inscribirte en una actividad que ya ha pasado.");
}

$sql = "INSERT INTO inscripciones (id_actividad, id_usuario) VALUES ('$id_acti', '$id_usu')";

if ($conn->query($sql) === TRUE) {
    header("Location: rm_actividades.php");
} else {
    die("Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();
?>
