<?php
class StudentModel {
    private $db;

    public function __construct($database) {
        $this->db = $database->getPDO(); 
    }
    public function createStudent($first_name, $email, $password, $role) {
        // Generar el hash de la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (:nombre, :correo, :contrasena, :rol)";
        // Preparar la consulta
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $hashed_password, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $role, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
