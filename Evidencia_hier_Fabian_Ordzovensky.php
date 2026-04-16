<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Moja herná knižnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Evidencia hier</h1>

    <h3>Pridať novú hru</h3>
    <form method="POST">
        <input type="text" name="názov" placeholder="Názov hry" required>
        <input type="number" name="rok" placeholder="Rok vydania">
        <select name="category_id">
            <option value="1">RPG</option>
            <option value="2">FPS</option>
            <option value="3">Simulator</option>
        </select>
        <button type="submit" name="pridať_hru">Uložiť</button>
    </form>

    <hr>

    <h3>Zoznam hier</h3>
    <table border="1">
        <tr>
            <th>Názov</th>
            <th>Kategória</th>
            <th>Rok</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['názov']; ?></td>
            <td><?php echo $row['kategória']; ?></td>
            <td><?php echo $row['rok_vydania']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <?php 
$conn = mysqli_connect("localhost", "root", "root", "evidencia_hier");
    if(!$conn){
        echo "nepodarilo sa pripojit" . mysqli_connect_error();
    }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pridať_hru'])) {
    $title = mysqli_real_escape_string($conn, $_POST['názov']); 
    $cat_id = (int)$_POST['category_id'];
    $year = (int)$_POST['rok'];

    $sql = "INSERT INTO hry (názov, category_id, rok_vydania) VALUES ('$title', $cat_id, $year)";
    mysqli_query($conn, $sql);
    header("Location: index.php"); 
}


$result = mysqli_query($conn, "SELECT hry.*, categories.name as kategória FROM hry JOIN categories ON hry.category_id = categories.id");
?>
</body>
</html>