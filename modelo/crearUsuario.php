<?php
require 'conexion.php';

$nombre = 'admin123';
$email = 'administrador@ejemplo.com';
$password = '1234567';
$rol = 1; // 1 para Administrador, 2 para Usuario Regular


// Cifrar la contraseña
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    $conexion = new Conexion(); // Crear una instancia de la clase Conexion

    $query = "INSERT INTO users (nombre, email, password, roles_id) VALUES (:nombre, :email, :password, :roles_id)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':roles_id', $rol);
    
    if ($stmt->execute()) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error al crear el usuario.";
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>