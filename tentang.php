<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💄 Tentang Kami - Lipstick Recommender</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <header>
        <h1>Tentang Kami</h1>
        <p>Lipstick Recommender adalah impian yang menjadi kenyataan.</p>
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
            <h2>Cerita Kami</h2>
            <p>Kami adalah sekelompok penggemar makeup yang menyadari betapa rumitnya mencari lipstik yang pas. Sering kali, warna yang terlihat cantik di kemasan ternyata tidak cocok di bibir. Dari situlah, ide untuk membangun sebuah platform yang bisa memberikan rekomendasi akurat lahir. Kami percaya, setiap orang berhak menemukan lipstik yang membuat mereka merasa paling cantik dan percaya diri.</p>
        </section>

        <section>
            <h2>Misi Kami</h2>
            <p>Membantu setiap individu, tanpa memandang warna kulit, menemukan lipstik yang sempurna. Kami bertekad untuk menjadi sumber informasi terpercaya, lengkap, dan mudah diakses untuk semua pecinta lipstik.</p>
        </section>
        
        <section>
            <h2>Ikuti Kami!</h2>
            <p>Jangan lewatkan tips, tren, dan info produk terbaru! Ikuti kami di media sosial:</p>
            <ul>
                <li>Instagram: @LipstickRecommender</li>
                <li>TikTok: @LipstickRecommender</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Lipstick Recommender.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
