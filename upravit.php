<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Upraviť hru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> [cite: 27]
</head>
<body class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h3 class="mb-0">Upraviť hru: <?php echo htmlspecialchars($hra['nazov']); ?></h3>
        </div>
        <div class="card-body">
            [cite_start]<form method="POST"> [cite: 14]
                <div class="mb-3">
                    <label class="form-label">Názov hry</label>
                    <input type="text" name="nazov" class="form-control" 
                           value="<?php echo htmlspecialchars($hra['nazov']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rok vydania</label>
                    <input type="number" name="rok" class="form-control" 
                           value="<?php echo $hra['rok_vydania']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategória</label>
                    <select name="category_id" class="form-select">
                        <?php while($cat = mysqli_fetch_assoc($categories)): ?>
                            <option value="<?php echo $cat['id']; ?>" 
                                <?php echo ($cat['id'] == $hra['category_id']) ? 'selected' : ''; ?>>
                                <?php echo $cat['name']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="Evidencia_hier_Fabian_Ordzovensky.php" class="btn btn-secondary">Zrušiť</a>
                    <button type="submit" name="upravit_hru" class="btn btn-warning">Uložiť zmeny</button>
                </div>
            </form>
        </div>
    </div>

<body>
<?php

    $conn = mysqli_connect("localhost", "root", "root", "evidencia_hier"); [cite: 5]

    if (!$conn) {
        die("Chyba pripojenia: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8mb4");


    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM hry WHERE id = $id");
        $hra = mysqli_fetch_assoc($result);

        if (!$hra) {
            die("Hra sa nenašla.");
        }
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upravit_hru'])) {
        $nazov = mysqli_real_escape_string($conn, $_POST['nazov']); [cite: 15, 16]
        $cat_id = (int)$_POST['category_id'];
        $rok = (int)$_POST['rok'];

        if (!empty($nazov)) {
            $sql = "UPDATE hry SET nazov = '$nazov', category_id = $cat_id, rok_vydania = $rok WHERE id = $id";
            if (mysqli_query($conn, $sql)) {
                header("Location: Evidencia_hier_Fabian_Ordzovensky.php"); // Návrat na hlavnú stránku
                exit();
            }
        }
    }


$categories = mysqli_query($conn, "SELECT * FROM categories")
?>


</body>
</html>