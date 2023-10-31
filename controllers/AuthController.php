<?php
require_once 'models/UserModel.php';

class AuthController {
    public function login($correo, $password) {
        $user = UserModel::getUserByUsername($correo);
        session_start();
        if ($user && UserModel::verifyPassword($password, $user['contrasena']) ) {
             
            $_SESSION['user'] = $user;
            switch ($user['rol_id']) {
                case '2':
                    header('Location: /OnMaestro');
                    break;
                case '3':
                    header('Location: /OnAlumno');
                    break;
                case '1':
                    header('Location: ./views/admin/admin_panel.php');
                         break;
                default:
                    echo "no se encontro nada";
                    break;
            }
        } else {
            header('Location: index.php'); // Redirige de nuevo al formulario de inicio de sesión
        }
    }
}
