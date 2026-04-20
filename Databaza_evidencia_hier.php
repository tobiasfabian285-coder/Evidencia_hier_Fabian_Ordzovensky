<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Inicializácia databázy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<?php
$conn = mysqli_connect("localhost", "root", "root");

if (!$conn) {
    die("<div class='alert alert-danger'>Pripojenie zlyhalo: " . mysqli_connect_error() . "</div>");
}


mysqli_set_charset($conn, "utf8mb4");


mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS evidencia_hier CHARACTER SET utf8mb4 COLLATE utf8mb4_slovak_ci");
mysqli_select_db($conn, "evidencia_hier");


mysqli_query($conn, "CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
)");


mysqli_query($conn, "CREATE TABLE IF NOT EXISTS hry (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazov VARCHAR(100) NOT NULL,
    category_id INT,
    rok_vydania INT,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
)");


$checkCat = mysqli_query($conn, "SELECT id FROM categories LIMIT 1");
if (mysqli_num_rows($checkCat) == 0) {
    mysqli_query($conn, "INSERT INTO categories (name) VALUES ('RPG'), ('FPS'), ('Simulator'), ('Stratégie'), ('Bojové')");
}


$checkHry = mysqli_query($conn, "SELECT id FROM hry LIMIT 1");
if (mysqli_num_rows($checkHry) == 0) {
    mysqli_query($conn, "INSERT INTO hry (nazov, category_id, rok_vydania) VALUES 
        ('The Witcher 3', 1, 2015), 
        ('Counter-Strike', 2, 2012),
        ('Euro Truck Simulator 2', 3, 2012)");
}

echo "<div class='alert alert-success'>
        <h4>Úspech!</h4>
        <p>Databáza a tabuľky boli úspešne vytvorené a naplnené dátami.</p>
        <a href='index.php' class='btn btn-primary'>Prejsť na aplikáciu</a>
      </div>";

mysqli_close($conn);
?>
</body>
</html>