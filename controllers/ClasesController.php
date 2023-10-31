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









    public function CrearClases()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/clases/crearclases.php";
    }



    public function vistamateria()
    {
        $database = new Database();
        $clases = new ClasesModel($database);
        $materias = $clases->getAllClases();
        include $_SERVER['DOCUMENT_ROOT'] . "/views/clases/clases.php";
    }
}