<?php
session_start(); // Asegurar que la sesión esté iniciada

// Inicia la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
}

// Si ya está iniciada la sesión, se eliminará al finalizar el formulario
if (isset($_SESSION["idUsuario"])) {
    unset($_SESSION["idUsuario"]); // Eliminar la variable de sesión
    session_destroy(); // Destruir toda la sesión
}


require '../modelo/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];

    $conexion = new Conexion();
    $query = "SELECT id_users, nombre, password, rango FROM users WHERE nombre = :nombre";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró un usuario y si la contraseña es válida
    if ($usuario && password_verify($password, $usuario["password"])) {
        $_SESSION["idUsuario"] = $usuario["id_users"];
        $_SESSION["nombreUsuario"] = $usuario["nombre"]; // Guarda el nombre
        $_SESSION["rangoUsuario"] = $usuario["rango"]; // Guarda el rango

        // Registrar el acceso en la base de datos
        $insertQuery = "INSERT INTO log_accesos (nombre,rango) VALUES (:nombre, :rango)";
        $stmt = $conexion->prepare($insertQuery);
        $stmt->bindParam(":nombre", $usuario["nombre"]);
        $stmt->bindParam(":rango", $usuario["rango"]);
        $stmt->execute();

         // Redirigir a la vista del inventario después del login
        header("Location: vista_inventario_de_vehiculos.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="mini_login.php">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
