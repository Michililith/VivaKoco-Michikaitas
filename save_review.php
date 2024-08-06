<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content_type = $_POST['content_type'];
    $title = $_POST['title'];
    $progress = $_POST['progress'];
    $psychological_comments = $_POST['psychological_comments'];
    $rating = $_POST['rating'];
    $poster = $_FILES['poster']['name'];
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["poster"]["name"]);
    move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file);

    $stmt = $conn->prepare("INSERT INTO reviews (content_type, title, poster, progress, psychological_comments, rating) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $content_type, $title, $poster, $progress, $psychological_comments, $rating);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content_type VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    poster VARCHAR(255),
    progress VARCHAR(50) NOT NULL,
    psychological_comments TEXT NOT NULL,
    rating INT NOT NULL
);
