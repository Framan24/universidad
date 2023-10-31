<?php
class AdminController {
    public static function showAdminPanel() {
        if (isset($_SESSION['user']) && $_SESSION['user']['rol_id'] === 1) {
            include './views/admin/admin_panel.php';
        } else {
            header('Location: index.php');
        }
    }
}
