<?php
require_once 'models/UserModel.php';
class AuthController {
    public static function login($username, $password) {
        $user = UserModel::getUserByUsername($username);

        if ($user && UserModel::verifyPassword($password, $user['contrasena']) && $user['rol'] === 'ADMIN') {
            $_SESSION['user'] = $user;
            header('Location: index.php?action=showAdminPanel'); 
        } else {
           header('Location: ./views/login_view.php'); 
        }
    }
}

