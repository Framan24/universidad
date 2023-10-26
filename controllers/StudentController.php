<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/models/StudentModel.php");
require_once './config/database.php';

class StudentController {
    
    
    public function crearcuenta($data) {
        $first_name = $data['first_name'];
        $email = $data['email'];
        $password = $data['password'];
        $role = 'estudiante'; 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $database = new Database(); 
        $studentModel = new StudentModel($database);
        $resultado = $studentModel->createStudent($first_name, $email, $hashed_password, $role);
        if ($resultado) {
            // Éxito: el estudiante se creó correctamente
            header('Location: /exitostudiante');
            exit;
        } else {
       
        }
    }
    
    
    public function CrearStudiante(){
        include $_SERVER['DOCUMENT_ROOT']. "/views/alumnos/create_student_view.php";
    }
    public function EstudianteCreado(){
        include $_SERVER['DOCUMENT_ROOT']. "/views/alumnos/success_student.php";
    }
}


