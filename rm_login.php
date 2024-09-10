<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="rm_styles.css">
</head>
<body>

<div>
    <h2>Bienvenido al Sistema de Inscripcion<br><br>Ingrese sus Datos</h2>
    <form action="rm_procesar_login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required>
        <button type="submit">Ingresar</button>
    </form>
    </div>
    <button onclick="window.location.href='rm_registro.php'">Crear Cuenta</button>
</body>
</html>
