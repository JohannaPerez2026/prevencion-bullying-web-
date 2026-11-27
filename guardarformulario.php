<?php
$conn = new mysqli("sql110.infinityfree.com", "if0_43409182", "cxWzmqWLPwkYB", "if0_43409182_proyecto");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuestas = [];
    for ($i = 1; $i <= 26; $i++) {
        $respuestas[] = $_POST["p" . $i] ?? '';
    }

    $columnas = "p" . implode(", p", range(1, 26));
    $placeholders = implode(", ", array_fill(0, 26, "?"));
    
    $sql = "INSERT INTO formulario ($columnas) VALUES ($placeholders)";
    $stmt = $conn->prepare($sql);
    
    $tipos = str_repeat("s", 26);
    $stmt->bind_param($tipos, ...$respuestas);

    if ($stmt->execute()) {
        echo "<h2>¡Respuestas guardadas correctamente!</h2>";
        echo "<a href='formulario.html'>Volver a la encuesta</a>";
    } else {
        echo "Error al guardar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>