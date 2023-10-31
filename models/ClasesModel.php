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
        $sql = "SELECT m.clase AS clase, ma.nombre AS nombre,m.id AS id 
        FROM materia AS m
        LEFT JOIN maestros AS ma ON m.id = ma.clase_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insertarMateria($data)
    {
        extract($data);
        $stmt = $this->db->query("INSERT INTO `materia`(`clase`) VALUES ('$materia')");
        if ($stmt){
            return true;
        }else {
            return false;
        }
        
       
    }
    public function editarmateria($data)
    {
        extract($data);
        
        $stmt = $this->db->query("UPDATE materia SET clase='$materia' WHERE id='$id'");
        if ($stmt){
            return true;
        }else {
            return false;
        }
        
       
    }
    public function eliminarclase($id)
    {
        var_dump($id);
        $sql1 = "DELETE FROM materia WHERE id = :id";
        $stmt1 = $this->db->prepare($sql1);
        $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt1->execute();
        return $stmt1->execute();
    }
}
