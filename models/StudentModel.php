<?php
class StudentModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getPDO();
    }

    public function createStudent($nombre, $correo, $password, $role, $dni, $apellido, $direccion)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_usuarios = "INSERT INTO usuarios (dni, correo, contrasena, rol_id) VALUES (:dni, :correo, :contrasena, :rol_id)";

        // Preparar la consulta para 'usuarios'
        $stmt_usuarios = $this->db->prepare($sql_usuarios);
        $stmt_usuarios->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt_usuarios->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt_usuarios->bindParam(':contrasena', $hashed_password, PDO::PARAM_STR);
        $stmt_usuarios->bindParam(':rol_id', $role, PDO::PARAM_INT); // Asumiendo que 'rol' es un número

        // Ejecutar la inserción en 'usuarios'
        $result_usuarios = $stmt_usuarios->execute();

        if ($result_usuarios) {
            // Si la inserción en 'usuarios' fue exitosa, inserta los datos en la tabla 'alumnos'
            $sql_alumnos = "INSERT INTO alumnos (nombre, apellido, dni,direccion, correo, rol_id) VALUES (:nombre, :apellido, :dni,:direccion, :correo, :rol_id)";

            // Preparar la consulta para 'alumnos'
            $stmt_alumnos = $this->db->prepare($sql_alumnos);
            $stmt_alumnos->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt_alumnos->bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt_alumnos->bindParam(':dni', $dni, PDO::PARAM_STR);
            $stmt_alumnos->bindParam(':direccion', $direccion, PDO::PARAM_STR);
            $stmt_alumnos->bindParam(':apellido', $apellido, PDO::PARAM_STR);
            $stmt_alumnos->bindParam(':rol_id', $role, PDO::PARAM_INT);

            // Ejecutar la inserción en 'alumnos'
            $result_alumnos = $stmt_alumnos->execute();

            // Devolver true si ambas inserciones son exitosas
            return $result_usuarios && $result_alumnos;
        } else {
            return false; // Si la inserción en 'usuarios' falla, retorna false
        }
    }
    public function getAllStudents()
    {
        $sql = "SELECT * FROM alumnos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllStudents2($dni)
    {
        $sql = "SELECT * FROM alumnos WHERE dni = $dni";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   

    public function eliminarEstudiante($dni) {
        $sql1 = "DELETE FROM usuarios WHERE dni = :dni";
        $sql2 = "DELETE FROM alumnos WHERE dni = :dni";

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
    public function editarstudent($dni, $nombre, $apellido, $correo, $direccion,$rol_id) {
        // Actualizar la tabla de usuarios
        $sql1 = "UPDATE usuarios SET  correo = :correo,rol_id = :rol_id WHERE dni = :dni";
        $stmt1 = $this->db->prepare($sql1);
        $stmt1->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt1->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt1->bindParam(':rol_id', $rol_id, PDO::PARAM_INT);
        $stmt1->execute();

        // Actualizar la tabla de alumnos
        $sql2 = "UPDATE alumnos SET nombre = :nombre, apellido = :apellido, direccion = :direccion, correo = :correo,rol_id = :rol_id WHERE dni = :dni";
        $stmt2 = $this->db->prepare($sql2);
        $stmt2->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt2->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt2->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $stmt2->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt2->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt2->bindParam(':rol_id', $rol_id, PDO::PARAM_INT);
        $stmt2->execute();

        // Devolver true si ambas actualizaciones se ejecutan con éxito
        return $stmt1->execute() && $stmt2->execute();
    }
}
