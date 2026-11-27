<?php
// EJEMPLO: reemplaza los valores con los datos del hosting.
// No subas este archivo con credenciales reales a un repositorio público.
$host = "HOST_DE_BASE_DE_DATOS";
$dbname = "Prevencion de bullyng";
$user = "Johanna";
$password = "123456Johanna";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    exit("No fue posible conectar con la base de datos.");
}
?>
