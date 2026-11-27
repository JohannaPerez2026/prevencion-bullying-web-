<?php
$conn = new mysqli("sql110.infinityfree.com", "if0_43409182", "cxWzmqWLPwkYB", "if0_43409182_proyecto");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los 4 campos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $edad = $_POST['edad'] ?? 0;
    $grupo = $_POST['grupo'] ?? '';
    $problema = $_POST['problema'] ?? '';

    // Preparar e insertar en la tabla "reportes"
    $stmt = $conn->prepare("INSERT INTO reportes (nombre, edad, grupo, problema) VALUES (?, ?, ?, ?)");
    
    // "siss" = string (nombre), integer (edad), string (grupo), string (problema)
    $stmt->bind_param("siss", $nombre, $edad, $grupo, $problema);

    if ($stmt->execute()) {
        echo "<h2>¡Tu reporte ha sido enviado y guardado de forma confidencial!</h2>";
        echo "<a href='index.html'>Volver al inicio</a>"; // Cambia index.html por el nombre real de tu archivo
    } else {
        echo "Error al guardar el reporte: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>