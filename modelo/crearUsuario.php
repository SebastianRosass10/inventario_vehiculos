<?php
require 'conexion.php';

$nombre = 'Juan Carlos';
$rango = 'bombero';
$email = 'JuanCarlos@ejemplo.com';
$password = 'JuanCarlos1';
$rol = 2; // 1 para Administrador, 2 para Usuario Regular

//comando paraa la terminal: php crearUsuario.php


// Cifrar la contraseña
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    $conexion = new Conexion(); // Crear una instancia de la clase Conexion

    $query = "INSERT INTO users (nombre, rango, email, password, roles_id) VALUES (:nombre, :rango, :email, :password, :roles_id)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':rango', $rango);
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