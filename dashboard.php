<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lipstick Recommender</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Semoga harimu menyenangkan. Siap menemukan warna sempurnamu?</p>
    </header>
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
    <main>
        <section>
            <h2>Dashboard Pengguna</h2>
            <p style="text-align: center; max-width: 600px; margin-bottom: 2rem;">Anda telah berhasil login. Gunakan menu cepat di bawah ini untuk menjelajahi fitur utama situs kami.</p>
            
            <div class="dashboard-grid">
                <div class="dashboard-card">
                    <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?q=80&w=2080&auto=format&fit=crop" alt="Berbagai macam lipstik">
                    <div class="dashboard-card-content">
                        <h3><i class="fa-solid fa-book-open"></i> Jelajahi Katalog</h3>
                        <p>Lihat semua koleksi lipstik terbaru dari berbagai merek ternama di seluruh dunia.</p>
                        <a href="katalog.php" class="dashboard-button">Lihat Katalog</a>
                    </div>
                </div>

                <div class="dashboard-card">
                    <img src="https://images.unsplash.com/photo-1586495777744-4413f21062fa?q=80&w=1974&auto=format&fit=crop" alt="Wanita memilih warna lipstik">
                    <div class="dashboard-card-content">
                        <h3><i class="fa-solid fa-lightbulb"></i> Temukan Warnamu</h3>
                        <p>Masih bingung? Biarkan kami merekomendasikan warna yang paling cocok untukmu.</p>
                        <a href="rekomendasi.php" class="dashboard-button">Dapatkan Rekomendasi</a>
                    </div>
                </div>

                <div class="dashboard-card">
                    <img src="https://images.unsplash.com/photo-1625093742435-6fa192b6fb10?q=80&w=1974&auto=format&fit=crop" alt="Produk lipstik elegan">
                    <div class="dashboard-card-content">
                        <h3><i class="fa-solid fa-users"></i> Tentang Kami</h3>
                        <p>Ketahui lebih lanjut tentang misi kami untuk membantu semua orang menemukan lipstik impian.</p>
                        <a href="tentang.php" class="dashboard-button">Baca Cerita Kami</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Lipstick Recommender.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>