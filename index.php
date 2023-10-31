<?php
session_start();
require_once 'controllers/StudentController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/ClasesController.php';
require_once 'controllers/TeacherController.php';

$urlCompleta = $_SERVER["REQUEST_URI"];
$urlPartida = explode("?", $urlCompleta);
$url = $urlPartida[0];

$admin = new AuthController();
$clases = new MateriaController();
$admin2 = new AdminController();
$cstudiante = new StudentController();
$cmaestro = new TeacherController();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    switch ($url) {
        case '/index.php':
            include './views/login_view.php'; // Muestra el formulario de inicio de sesión
            break;
        case '/c-estudiante':
            $cstudiante->CrearStudiante();
            break;
            case '/c-clases':
                $clases->CrearClases();
                break;
                case '/e-materia':
                    $clases->Editarmateria();
                    break;
        case '/e-estudiante':
            $cstudiante->EditarStudiante();
            break;
        case '/alumno':
            $cstudiante->ListaAlumnos();
            break;
            case '/materias':
                $clases->vistamateria();
                break;
        case '/OnAlumno':
            $cstudiante->OnAlumno();
            break;
        case '/maestro':
            $cmaestro->ListaMaestro();
            break;
        case '/OnMaestro':
            $cmaestro->OnMaestro();
            break;
        case '/c-maestro':
            $cmaestro->createTeacher();
            break;
        case '/exitostudiante':
            $cstudiante->EstudianteCreado();
            break;
        case '/exitosmaestro':
            $cmaestro->MaestroCreado();
            break;
        default:
            echo "Página no encontrada";
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($url) {
        case '/inicio':
            $correo = $_POST['correo'];
            $password = $_POST['password'];
            $admin->login($correo, $password);
            break;
        case '/crearstudiante':
            $cstudiante->crearcuenta($_POST);
            break;
            case '/crearMateria':
                $clases->crearMateria($_POST);
                break;
                case '/editarmateria':
                    $clases->Editarmateria1($_POST);
                    break;
        case '/editarestudiante':
            $cstudiante->editarEstudiante($_POST);
            break;
        case '/crearmaestro':
            $cmaestro->crearcuentam($_POST);
            break;
        case '/eliminar-estudiante':
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $dniEstudiante = $_POST['dni'];
                $cstudiante->eliminarEstudiante($dniEstudiante);
            }
            break;
        case '/eliminar-maestro':
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $dnimaestro = $_POST['dni'];
                $cmaestro->eliminarMaestro($dnimaestro);
            }
            break;
            case '/borrarclase':
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $idclase = $_POST['id'];
                    $clases->borrarclase($idclase);
                }
                break;
        default:
            echo "Página no encontrada";
            break;
    }
}
