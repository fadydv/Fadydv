<?php session_start(); ?>
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
            <p>Jelajahi daftar produk lengkap di bawah ini, atau gunakan pencarian untuk memfilter hasil secara dinamis.</p>
            <div id="katalogList" class="katalog-grid">
                <p>Memuat data katalog...</p>
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

        <section>
            <h2>Daftar Produk</h2>
            <p>Temukan lipstik idamanmu dari daftar lengkap di bawah ini:</p>
            <article>
                <h3>MAC Matte Lipstick</h3>
                <ul>
                    <li>Ruby Woo: Merah cerah klasik dengan finish matte. Sangat pigmented.</li>
                    <li>Velvet Teddy: Nude cokelat yang lembut, sempurna untuk tampilan sehari-hari.</li>
                    <li>Chili: Merah-cokelat hangat yang cocok untuk kulit sawo matang.</li>
                </ul>
            </article>
            <article>
                <h3>Wardah Colorfit Velvet Matte Lip Mousse</h3>
                <ul>
                    <li>08 Brown Creator: Warna cokelat netral yang cocok untuk semua undertone.</li>
                    <li>10 Vibrant Red: Merah terang yang membuat wajah tampak segar.</li>
                    <li>12 Cocoa Mood: Cokelat gelap untuk tampilan yang dramatis dan bold.</li>
                </ul>
            </article>
            <article>
                <h3>Maybelline Superstay Matte Ink Liquid Lipstick</h3>
                <ul>
                    <li>Pioneer: Merah dengan undertone biru yang membuat gigi terlihat lebih putih.</li>
                    <li>Lover: Pink keunguan yang manis.</li>
                    <li>Seductress: Nude cokelat-karamel yang tahan lama hingga 16 jam.</li>
                </ul>
            </article>
            <article>
                <h3>NYX Soft Matte Lip Cream</h3>
                <ul>
                    <li>Stockholm: Nude-peach hangat yang populer.</li>
                    <li>Cannes: Dusty rose dengan undertone netral.</li>
                    <li>Monte Carlo: Merah tua yang elegan.</li>
                </ul>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Lipstick Recommender.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>