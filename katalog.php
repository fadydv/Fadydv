<?php
session_start();
require 'koneksi.php';

$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💄 Katalog Lipstik Lengkap - Lipstick Recommender</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <header>
        <h1>Katalog Lengkap</h1>
        <p>Jelajahi setiap warna dan merek yang kamu suka.</p>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="katalog.php">Katalog Lengkap</a></li>
                <li><a href="rekomendasi.php">Temukan Warna Idealmu</a></li>
                <li><a href="tentang.php">Tentang Kami</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php" class="nav-button-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" class="nav-button"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                <?php endif; ?>
                <li><button class="toggle-button" id="darkModeToggle">🌙 Mode Gelap</button></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Katalog Lipstick Lengkap</h2> 
            <p>Jelajahi daftar produk lengkap dari database kami.</p>
            
            <div id="katalogList" class="katalog-grid">
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="lipstick-card">
                            <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['nama']); ?>" class="lipstick-image">
                            <div class="lipstick-card-content">
                                <h3 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h3> 
                                <p class="card-brand"><?php echo htmlspecialchars($row['brand']); ?></p> 
                                <p class="card-price"><?php echo htmlspecialchars($row['harga']); ?></p> 
                                <p class="card-description"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                                
                                <?php if (isset($_SESSION['username'])): ?>
                                    <div class="action-buttons">
                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                                        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Anda yakin ingin menghapus produk ini?');">Hapus</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p style="text-align: center; width: 100%; grid-column: 1 / -1;">Belum ada produk di katalog. Silakan login sebagai admin untuk menambahkan produk.</p>
                <?php endif; ?>
            </div>
        </section>
        
        <section>
            <h2>Merek-merek Terkemuka</h2>
            <p>Cari lipstik favoritmu berdasarkan merek atau jenis.</p>
            <dl>
                <dt>MAC Cosmetics</dt>
                <dd>Brand ikonik dari AS, dikenal dengan formula pigmen yang kuat dan pilihan warna klasik.</dd>
                <dt>Wardah</dt>
                <dd>Merek lokal terkemuka dari Indonesia, populer dengan produk halal dan harga terjangkau.</dd>
                <dt>Maybelline</dt>
                <dd>Salah satu merek kosmetik terbesar di dunia, menawarkan produk berkualitas dengan inovasi terbaru.</dd>
                <dt>NYX Professional Makeup</dt>
                <dd>Terkenal dengan produk-produk profesional yang terjangkau, disukai oleh makeup artist dan penggemar makeup.</dd>
                <dt>Focallure</dt>
                <dd>Merek kosmetik dari Tiongkok yang sedang naik daun, menawarkan produk dengan formula ringan dan modern.</dd>
            </dl>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Lipstick Recommender.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
