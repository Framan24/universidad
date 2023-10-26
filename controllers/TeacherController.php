<?php
class TeacherController {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function createTeacher($data) {
        // Validación adicional de los datos (asegúrate de realizar una validación adecuada)

        // Obtener el rol del formulario
        $role = $data['role'];

        // Crear una instancia del modelo TeacherModel
        $teacherModel = new TeacherModel($this->db);

        // Llamar al método createTeacher del modelo para crear la cuenta del maestro
        $success = $teacherModel->createTeacher($data['name'], $data['email'], $role);

        if ($success) {
            // Redirigir a una página de éxito o mostrar un mensaje de confirmación
            header('Location: ./views/maestros/success_teacher.php');
        } else {
            // Redirigir a una página de error o mostrar un mensaje de error
            header('Location: error_page.php');
        }
    }
}

