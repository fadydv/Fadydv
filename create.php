<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $sql = "INSERT INTO lipsticks (kode, nama, brand, harga, deskripsi)
            VALUES ('$kode', '$nama', '$brand', '$harga', '$deskripsi')";
    mysqli_query($conn, $sql);

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Lipstik Baru</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Tambah Lipstik Baru</h1></header>
    <main>
        <section>
            <form method="POST" class="crud-form">
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode" required>
                </div>
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="brand" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" name="harga" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="4" required></textarea>
                </div>
                <button type="submit">Simpan</button>
                <a href="dashboard.php" class="cancel-link">Batal</a>
            </form>
        </section>
    </main>
</body>
</html>