<?php
$host = "sql110.infinityfree.com";
$dbname = "if0_43409182_proyecto";
$user = "if0_43409182";
$password = "cxWzmqWLPwkYB";

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