<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="stylesheet" href="rm_styles.css">
</head>
<body>
    <h2>Registrarse</h2>
    <form action="rm_procesar_registro.php" method="post">
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required>
        <label for="primer_apellido">Primer Apellido:</label>
        <input type="text" id="primer_apellido" name="primer_apellido" required>
        <label for="segundo_apellido">Segundo Apellido:</label>
        <input type="text" id="segundo_apellido" name="segundo_apellido" required>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>
        <button type="submit">Registrarme</button>
    </form>

    <br><br>
        <button onclick="window.location.href='rm_login.php'">Regresar</button>
</body>
</html>
