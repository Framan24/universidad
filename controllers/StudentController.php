<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/StudentModel.php");
require_once './config/database.php';

class StudentController
{


    public function crearcuenta($data)
    {
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $correo = $data['correo'];
        $password = $data['password'];
        $dni = $data['dni'];
        $direccion = $data['direccion'];
        $role = 3;
        $database = new Database();
        $studentModel = new StudentModel($database);
        $resultado = $studentModel->createStudent($nombre, $correo, $password, $role, $dni, $apellido, $direccion);
        if ($resultado) {
            // Éxito: el estudiante se creó correctamente
            header('Location: /exitostudiante');
            exit;
        } else {
        }
    }
    public function editarEstudiante() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $rol_id = $_POST['rol_id'];
            $database = new Database();
            $studentModel = new StudentModel($database);
            if ($studentModel->editarstudent($dni, $nombre, $apellido, $correo, $direccion,$rol_id)) {
                header('Location: /alumno');
                exit;
            } else {
                echo "Error al editar al estudiante.";
            }
        }
    }
    public function eliminarEstudiante()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $idEstudiante = $_POST['dni'];
            $database = new Database();
            $studentModel = new StudentModel($database);
            if ($studentModel->eliminarEstudiante($idEstudiante)) {
                header('Location: /alumno');
                exit;
            } else {
                echo "Error al eliminar al estudiante.";
            }
        }
    }



    public function CrearStudiante()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/alumnos/create_student_view.php";
    }
    public function EditarStudiante()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/alumnos/editstudiante.php";
    }
    public function EstudianteCreado()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/views/alumnos/success_student.php";
    }
    public function ListaAlumnos()
    {
        $database = new Database();
        $studentModel = new StudentModel($database);
        $students = $studentModel->getAllStudents();
        include $_SERVER['DOCUMENT_ROOT'] . "/views/alumnos/alumnos.php";
    }
    public function OnAlumno()

    {
      
        extract($_SESSION['user']);
        $database = new Database();
        $studentModel = new StudentModel($database);
        $students = $studentModel->getAllStudents2($dni);

        include $_SERVER['DOCUMENT_ROOT'] . "/views/alumnos/onalumno.php";
    }
}
