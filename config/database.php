<?php
class Database {
    private $host = "localhost";
    private $dbname = "universidad";
    private $username = "root";
    private $password = "";
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }

    public function getPDO() {
        return $this->db;
    }
}
