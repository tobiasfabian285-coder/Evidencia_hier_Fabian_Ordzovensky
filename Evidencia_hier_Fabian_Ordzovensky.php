<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Evidencia hier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Evidencia hier</h1>

    <div class="card card-body mb-4 shadow-sm">
        <h3>Pridať novú hru</h3>
        <form method="POST">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="nazov" class="form-control" placeholder="Názov hry" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="rok" class="form-control" placeholder="Rok vydania">
                </div>
                <div class="col-md-3">
                    <select name="category_id" class="form-select">
                        <option value="1">RPG</option>
                        <option value="2">FPS</option>
                        <option value="3">Simulator</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="pridat_hru" class="btn btn-primary w-100">Uložiť</button>
                </div>
            </div>
        </form>
    </div>

    <h3>Zoznam uložených hier</h3>
    <table class="table table-striped border shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>Názov</th>
                <th>Kategória</th>
                <th>Rok vydania</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nazov']); ?></td>
                <td><?php echo htmlspecialchars($row['kategoria_nazov']); ?></td>
                <td><?php echo $row['rok_vydania']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<?php

$conn = mysqli_connect("localhost", "root", "root", "evidencia_hier");

if (!$conn) {
    die("Chyba pripojenia k databáze: " . mysqli_connect_error());
}


mysqli_set_charset($conn, "utf8mb4");




include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pridat'])) {
    $nazov = mysqli_real_escape_string($conn, $_POST['nazov']); 
    $cat_id = (int)$_POST['category_id'];
    $rok = (int)$_POST['rok'];

    if (!empty($nazov)) {
        mysqli_query($conn, "INSERT INTO hry (nazov, category_id, rok_vydania) VALUES ('$nazov', $cat_id, $rok)");
        header("Location: index.php");
        exit();
    }
}

$res = mysqli_query($conn, "SELECT hry.*, categories.name AS kat_nazov FROM hry JOIN categories ON hry.category_id = categories.id");
?>
</body>
</html>