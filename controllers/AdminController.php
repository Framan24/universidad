<?php
class AdminController {
    public static function showAdminPanel() {
        // Verificar si el usuario está autenticado como administrador
        if (isset($_SESSION['user']) && $_SESSION['user']['rol'] === 'ADMIN') {
            include './views/admin/admin_panel.php';
        } else {
           
            header('Location: index.php'); 
        }
    }
    
}