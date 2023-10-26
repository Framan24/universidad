<?php
class UserModel {
    public static function getUserByUsername($username) {
        $pdo = new PDO("mysql:host=localhost;dbname=universidad", "root", "");

        $sql = "SELECT * FROM usuarios WHERE nombre = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public static function verifyPassword($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }
}
