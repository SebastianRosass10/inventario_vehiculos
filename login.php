<?php
session_start();
require_once 'modelo/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conexion = new Conexion();
    // $conn = $conexion->conectar();
    $query = "SELECT id_users, password, roles_id FROM users WHERE email = :email";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró un usuario y si la contraseña es válida
    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['idUsuario'] = $usuario['id_users'];
        $_SESSION['roles'] = $usuario['roles_id'];
        header('Location: index.php');
        exit();
    } else {
        echo "<script>alert('Usuario o contraseña incorrecta.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="public/css/login_style.css"> 
</head>
<body>
    <div class="login-container">
        <form method="POST" action="login.php" class="login-form">
            <h2>Inicio de Sesión</h2>
            <div class="input-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" placeholder="Correo electrónico" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <!--<a  href="registro.php"> -->Regístrate aquí</a></p>
    </div>
</body>
</html>

