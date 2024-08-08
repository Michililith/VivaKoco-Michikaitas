<?php
// Definir la ubicación del archivo JSON
$file = 'reviews.json';

// Leer el archivo JSON
$reviews = file($file, FILE_IGNORE_NEW_LINES);

// Mostrar cada reseña
foreach ($reviews as $review) {
    $data = json_decode($review, true);
    echo "<div>";
    echo "<h2>{$data['title']}</h2>";
    echo "<p><strong>Tipo:</strong> {$data['content_type']}</p>";
    echo "<p><strong>Progreso:</strong> {$data['progress']}</p>";
    echo "<p><strong>Comentarios:</strong> {$data['psychological_comments']}</p>";
    echo "<p><strong>Calificación:</strong> {$data['rating']}</p>";
    echo "</div>";
}
?>
