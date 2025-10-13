<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
require 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM lipsticks ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Lipstick CRUD</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <h1>Dashboard Lipstick</h1>
    </header>
    <nav>
        <ul>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="logout.php" class="nav-button-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            <?php else: ?>
            <li><a href="login.php" class="nav-button"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
            <?php endif; ?>
            <li><button class="toggle-button" id="darkModeToggle">🌙 Mode Gelap</button></li>
        </ul>
    </nav>
    <main>
        <section class="crud-section">
            <div class="dashboard-header">
                <p>Selamat datang, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!</p>
            </div>

            <div class="action-top">
                <a href="create.php" class="btn-add-product">+ Tambah Lipstik Baru</a>
            </div>

            <div class="product-grid">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="product-card">
                            <div class="product-card-content">
                                <h3><?php echo htmlspecialchars($row['nama']); ?></h3>
                                <p><strong>Kode:</strong> <?php echo htmlspecialchars($row['kode']); ?></p>
                                <p><strong>Brand:</strong> <?php echo htmlspecialchars($row['brand']); ?></p>
                                <p><strong>Harga:</strong> <?php echo htmlspecialchars($row['harga']); ?></p>
                                <p class="description"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                                <div class="action-buttons">
                                    <a href="update.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="no-data">Belum ada data lipstik. Silakan tambahkan produk baru.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Lipstick Recommender</p>
    </footer>
</body>
</html>
