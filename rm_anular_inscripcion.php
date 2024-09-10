<?php
session_start();
include('rm_conexion.php');

if (!isset($_SESSION['id_usu'])) {
    header("Location: rm_login.php");
    exit();
}

$id_inscripcion = $_POST['id_inscripcion'];

$sql = "DELETE FROM inscripciones WHERE id='$id_inscripcion'";

if ($conn->query($sql) === TRUE) {
    header("Location: rm_mis_inscripciones.php");
} else {
    die("Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();
?>
