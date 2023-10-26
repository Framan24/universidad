<?php
session_start();
require_once 'controllers/StudentController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/TeacherController.php';
$urlCompleta = $_SERVER["REQUEST_URI"];
$urlPartida = explode("?", $urlCompleta);
$url = $urlPartida[0];



$admin = new AuthController();
$admin2 = new AdminController();
$cstudiante =new StudentController();


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    switch ($url) {
        case '/index.php':
            $admin->login($username, $password);
            break;
        
            case '/index.php':
                $admin->login($username, $password);
                break;
            case '/c-estudiante':
                $cstudiante->CrearStudiante();
                break;
                case '/exitostudiante':
                    $cstudiante->EstudianteCreado();
                    break;
        default:
            echo "nose encontro";
            break;
    }


}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($url) {
        case '/inicio':
            $admin2->showAdminPanel();
            break;
            
            case '/crearstudiante':
                $cstudiante->crearcuenta($_POST);
                break;
        
        default:
            # code...
            break;
    }
}
