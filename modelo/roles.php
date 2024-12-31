<?php
class Roles {
    private $conn;
    private $table_name = 'roles';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para obtener todos los roles
    public function obtenerRoles() {
        $query = 'SELECT * FROM ' . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para obtener un rol por su nombre
    public function obtenerRolPorNombre($nombre) {
        $query = 'SELECT id_roles FROM ' . $this->table_name . ' WHERE nombre = :nombre';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para crear roles por defecto si no existen
    public function crearRolesPorDefecto() {
        $roles = array(
        'Administrador',
        'Usuario'
    );

    foreach ($roles as $rol) {
        $query = 'INSERT INTO ' . $this->table_name . ' (nombre) VALUES (:nombre)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $rol, PDO::PARAM_STR);
        $stmt->execute();

    // Método para crear un nuevo rol
    // public function crearRol($nombre) {
    //     $query = 'INSERT INTO ' . $this->table_name . ' (nombre) VALUES (:nombre)';
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    //     if ($stmt->execute()) {
    //         return $this->conn->lastInsertId();
    //     } else {
    //         return false;
    //     }
        }
    }
}
?>
