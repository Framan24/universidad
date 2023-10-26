<?php
class TeacherModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function createTeacher($data, $role) {
        // Validación de datos (asegúrate de realizar una validación adecuada)
        $first_name = $data['first_name'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
    
        // Consulta SQL para insertar un nuevo maestro en la base de datos
        $sql = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (:nombre, :correo, :contrasena, :rol)";
    
        // Preparar la consulta
        $stmt = $this->db->prepare($sql);
    
        // Vincular parámetros, incluyendo el rol
        $stmt->bindParam(':nombre', $first_name, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $password, PDO::PARAM_STR);
        $stmt->bindParam(':rol', $role, PDO::PARAM_STR);
    
        // Ejecutar la consulta
        return $stmt->execute();
    }
    
}