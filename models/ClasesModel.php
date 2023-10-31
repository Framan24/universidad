<?php

class ClasesModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database->getPDO();
    }


    public function getAllClases()
    {
        $sql = "SELECT * from materia m inner join maestros m2 on m.id =m2.clase_id;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertarMateria($data)
    {extract($data);


        try {
            // Comienza una transacción para garantizar la consistencia de la base de datos
            $this->db->beginTransaction();

            // Paso 1: Inserta la materia en la tabla de materias
            $sql = "INSERT INTO materias (materia, maestro_id) VALUES (:nombreMateria, :maestroId)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nombreMateria', $nombre_materia, PDO::PARAM_STR);
            $stmt->bindParam(':maestroId', $maestro_id, PDO::PARAM_INT);
            $stmt->execute();

            // Paso 2: Realiza cualquier otra operación relacionada con la inserción si es necesario
            // Ejemplo: Puedes realizar una inserción adicional en otra tabla si es necesario.

            // Paso 3: Confirma la transacción si todas las operaciones son exitosas
            $this->db->commit();

            return true; // Todo se insertó correctamente
        } catch (PDOException $e) {
            // En caso de error, deshace la transacción y maneja el error
            $this->db->rollBack();
            return false; // Hubo un error en la inserción
        }
    }
}
