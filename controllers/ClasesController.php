<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/ClasesModel.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/database.php");

class MateriaController
{
    public function crearMateria($data)
    {
       $database = new Database();
       $update = new ClasesModel($database);
       $update->insertarMateria($data);
       if ($update){
        header('Location: /materias');
       }
    }
    public function Editarmateria1($data)
    {
        $database = new Database();
        $update = new ClasesModel($database);
        $update->editarmateria($data);
        if ($update){
         header('Location: /materias');
        }
    }
    public function borrarclase()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST['id'];
            var_dump($_POST);
            $database = new Database();
            $clasesmodel = new ClasesModel($database);
            if ($clasesmodel->eliminarclase($id)) {
                header('Location: /materias');
                exit;
            } else {
                echo "Error al eliminar  clase.";
            }
        }
    }

    









    public function CrearClases()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/clases/crearclases.php";
    }
    public function Editarmateria ()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/clases/editarclases.php";
    }


    public function vistamateria()
    {
        $database = new Database();
        $clases = new ClasesModel($database);
        $materias = $clases->getAllClases();
        include $_SERVER['DOCUMENT_ROOT'] . "/views/clases/clases.php";
    }
}