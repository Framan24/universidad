<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/models/TeacherModel.php");
require_once './config/database.php';

class TeacherController {


    public function crearcuentam($data) {
        $nombre = $data['nombre'];
        $apellido =$data['apellido'];
        $correo = $data['correo'];
        $password = $data['password'];
        $dni = $data['dni'];
        $direccion =$data['direccion'];
        $role = 2; 
        $database = new Database(); 
        $Teachermodel = new TeacherModel($database);
        $resultado = $Teachermodel->createTeacher($nombre, $correo, $password, $role,$dni,$apellido,$direccion);
        if ($resultado) {
            // Éxito: el estudiante se creó correctamente
            header('Location: /maestro');
            exit;
        } else {
       
        }
    }
    public function eliminarMaestro()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $dniMaestro = $_POST['dni'];
            $database = new Database();
            $Teachermodel = new TeacherModel($database);
            if ($Teachermodel->eliminarMaestro($dniMaestro)) {
                header('Location: /maestro');
                exit;
            } else {
                echo "Error al eliminar al estudiante.";
            }
        }
    }

    public function  createTeacher(){
        include $_SERVER['DOCUMENT_ROOT']. "/views/maestros/create_teacher_view.php";
    }
    public function MaestroCreado(){
        include $_SERVER['DOCUMENT_ROOT']. "/views/maestros/success_teacher.php";
    }
    public function ListaMaestro(){
        $database = new Database();
        $Teachermodel = new TeacherModel($database);
        $teacher = $Teachermodel->getAllAmaestros();
        include $_SERVER['DOCUMENT_ROOT']. "/views/maestros/maestro.php";
    }
    public function OnMaestro(){
        extract($_SESSION['user']);
        $database = new Database();
        $Teachermodel = new TeacherModel($database);
        $teacher = $Teachermodel->getAllAmaestros2($dni);
        include $_SERVER['DOCUMENT_ROOT']. "/views/maestros/onmaestro.php";
    }
}
