<?php
include('rm_conexion.php');

$nombres = $_POST['nombres'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$contraseña = $_POST['contraseña'];

// Validaciones
if (!is_numeric($telefono)) {
    die("El teléfono debe ser un número.");
}

if (strlen($contraseña) < 8) {
    die("La contraseña debe tener al menos 8 caracteres.");
}

$usuario = strtolower(explode(' ', trim($nombres))[0] . '.' . $primer_apellido);

$hash_contraseña = password_hash($contraseña, PASSWORD_BCRYPT);

$sql = "INSERT INTO usuario (nombres, primer_apellido, segundo_apellido, usuario, correo, telefono, contraseña)
        VALUES ('$nombres', '$primer_apellido', '$segundo_apellido', '$usuario', '$correo', '$telefono', '$hash_contraseña')";

if ($conn->query($sql) === TRUE) {
    header("Location: rm_login.php");
} else {
    if ($conn->errno == 1062) {
        die("El correo o el usuario ya existen.");
    } else {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
}

$conn->close();
?>
