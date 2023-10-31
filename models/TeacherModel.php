<?php
class TeacherModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getPDO();
    }
    public function createTeacher($nombre, $correo, $password, $role, $dni, $apellido, $direccion)
    {
        // Generar el hash de la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_usuarios = "INSERT INTO usuarios (dni, correo, contrasena, rol_id) VALUES (:dni, :correo, :contrasena, :rol_id)";
        // Preparar la consulta
        $stmt_usuarios = $this->db->prepare($sql_usuarios);
        $stmt_usuarios->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt_usuarios->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt_usuarios->bindParam(':contrasena', $hashed_password, PDO::PARAM_STR);
        $stmt_usuarios->bindParam(':rol_id', $role, PDO::PARAM_INT);

        $result_usuarios = $stmt_usuarios->execute();

        if ($result_usuarios) {
            
            $sql_maestros = "INSERT INTO maestros (nombre,apellido,dni,direccion, correo, rol_id) VALUES (:nombre, :apellido,:dni,:direccion, :correo, :rol_id)";

            // Preparar la consulta para 'alumnos'
            $stmt_maestros = $this->db->prepare($sql_maestros);
            $stmt_maestros->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt_maestros->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt_maestros->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt_maestros->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt_maestros->bindParam(':apellido', $apellido, PDO::PARAM_STR);
            $stmt_maestros->bindParam(':rol_id', $role, PDO::PARAM_INT);
           
            $result_maestros = $stmt_maestros->execute();
            // Devolver true si ambas inserciones son exitosas
            return $result_usuarios && $result_maestros;
        } else {
            return false; // Si la inserción en 'usuarios' falla, retorna false
        }
    }
    public function getAllAmaestros() {
        $sql = "SELECT * FROM maestros";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllAmaestros2($dni) {
        $sql = "SELECT m.*, c.clase AS clase 
                FROM maestros AS m
                INNER JOIN materia AS c ON m.clase_id = c.id
                WHERE m.dni = :dni";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function eliminarMaestro($dni) {
        $sql1 = "DELETE FROM usuarios WHERE dni = :dni";
        $sql2 = "DELETE FROM maestros WHERE dni = :dni";
        // Preparar y ejecutar la primera sentencia SQL
        $stmt1 = $this->db->prepare($sql1);
        $stmt1->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt1->execute();
        // Preparar y ejecutar la segunda sentencia SQL
        $stmt2 = $this->db->prepare($sql2);
        $stmt2->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt2->execute();
        // Devolver true si ambas sentencias se ejecutan con éxito
        return $stmt1->execute() && $stmt2->execute();
    }
}
