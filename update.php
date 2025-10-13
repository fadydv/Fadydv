<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); exit;
}
require 'koneksi.php';

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM lipsticks WHERE id = $id");
$row = mysqli_fetch_assoc($res);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $sql = "UPDATE lipsticks
            SET kode='$kode', nama='$nama', brand='$brand', harga='$harga', deskripsi='$deskripsi'
            WHERE id = $id";
    mysqli_query($conn, $sql);

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Lipstik</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Edit Lipstik</h1></header>
    <main>
        <section>
            <form method="POST" class="crud-form">
                <div class="form-group">
                    <label>Kode:</label>
                    <input type="text" name="kode" value="<?php echo htmlspecialchars($row['kode']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Brand:</label>
                    <input type="text" name="brand" value="<?php echo htmlspecialchars($row['brand']); ?>">
                </div>
                <div class="form-group">
                    <label>Harga:</label>
                    <input type="text" name="harga" value="<?php echo htmlspecialchars($row['harga']); ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi:</label>
                    <textarea name="deskripsi" rows="4"><?php echo htmlspecialchars($row['deskripsi']); ?></textarea>
                </div>
                <button type="submit">Update</button>
                <a href="dashboard.php" class="cancel-link">Batal</a>
            </form>
        </section>
    </main>
</body>
</html>