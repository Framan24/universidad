<?php
// Conecta a la base de datos
$pdo = new PDO("mysql:host=localhost;dbname=universidad", "root", "");

// Consulta todas las contraseñas en texto claro
$sql = "SELECT id, contrasena FROM usuarios";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Recorre los resultados y actualiza las contraseñas
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $hashedPassword = password_hash($row['contrasena'], PASSWORD_DEFAULT);
    $userId = $row['id'];

    // Actualiza la contraseña en la base de datos con el hash
    $updateSql = "UPDATE usuarios SET contrasena = :hashedPassword WHERE id = :userId";
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->bindParam(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
    $updateStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $updateStmt->execute();
}

echo "Migración de contraseñas completada.";
?>
