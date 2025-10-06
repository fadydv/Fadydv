<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💄 Rekomendasi Lipstik Sesuai Kulit - Lipstick Recommender</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <header>
        <h1>Temukan Lipstik Idamanmu</h1>
        <p>Kami akan bantu kamu menemukan lipstik yang paling pas.</p>
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
            <h2>Jawab Pertanyaan Ini untuk Mulai</h2>
            <p>Pilih kategori yang paling sesuai dengan warna dan undertone kulitmu.</p>
        </section>
        
        <section id="recommender-section">
            <h2>Temukan Lipstik Sempurna Anda dengan Rekomendasi Personal</h2>
            <p>Jawab dua pertanyaan di bawah ini untuk mendapatkan rekomendasi shade, finish, dan tips aplikasi terbaik yang sesuai dengan fitur wajah Anda.</p>

            <form id="recommenderForm">
                <div class="form-group">
                    <label for="skinTone">1. Apa Kategori Warna Kulit Utama Anda?</label>
                    <select id="skinTone" name="skinTone" required>
                        <option value=""> Pilih Kategori Kulit </option>
                        <option value="putih">Putih / Fair</option>
                        <option value="kuning-langsat">Kuning Langsat / Light</option>
                        <option value="sawo-matang">Sawo Matang / Medium</option>
                        <option value="gelap">Gelap / Deep</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lipType">2. Apa Karakteristik Bibir Anda Saat Ini?</label>
                    <select id="lipType" name="lipType" required>
                        <option value=""> Pilih Jenis Bibir </option>
                        <option value="normal">Normal (Sehat, Tidak Kering)</option>
                        <option value="kering">Cenderung Kering/Pecah-pecah</option>
                        <option value="bervolume">Bervolume/Penuh</option>
                    </select>
                </div>
                <button type="submit" id="submitRecommendation">Dapatkan Rekomendasi</button>
            </form>

            <div id="recommendationResult">
                <p style="text-align: center; margin-top: 20px; font-style: italic;">Silakan isi formulir di atas untuk melihat rekomendasi personal Anda.</p>
            </div>
        </section>

        <section>
            <h3>1. Untuk Kulit Cerah (Light)</h3>
            <p>Pilihan lipstik yang cocok: pink muda, nude dengan sentuhan pink, atau merah berry.</p>
            <article>
                <h4>Rekomendasi untuk Undertone Hangat:</h4>
                <ul>
                    <li>Maybelline Color Sensational Creamy Matte Lipstick - Shade "Rich Ruby"</li>
                    <li>Emina Creamatte - Shade "Peach Crush"</li>
                </ul>
            </article>
            <article>
                <h4>Rekomendasi untuk Undertone Dingin:</h4>
                <ul>
                    <li>Revlon Super Lustrous Lipstick - Shade "Fuchsia Fusion"</li>
                    <li>Pixy Lip Cream - Shade "Sweet Choco"</li>
                </ul>
            </article>
        </section>
        
        <section>
            <h3>2. Untuk Kulit Sedang (Medium)</h3>
            <p>Pilihan lipstik yang cocok: merah bata, mauve, atau nude karamel.</p>
            <article>
                <h4>Rekomendasi untuk Undertone Hangat:</h4>
                <ul>
                    <li>Wardah Intense Matte Lipstick - Shade "Blushing Nude"</li>
                    <li>Make Over Intense Matte Lip Cream - Shade "Pompous"</li>
                </ul>
            </article>
            <article>
                <h4>Rekomendasi untuk Undertone Dingin:</h4>
                <ul>
                    <li>L'Oreal Paris Colour Riche Matte Lipstick - Shade "Matte-sterpiece"</li>
                    <li>Luxcrime Ultra Satin Lipstick - Shade "Cuddles"</li>
                </ul>
            </article>
        </section>

        <section>
            <h3>3. Untuk Kulit Gelap (Deep)</h3>
            <p>Pilihan lipstik yang cocok: burgundy, merah tua, atau cokelat intens.</p>
            <article>
                <h4>Rekomendasi untuk Undertone Hangat:</h4>
                <ul>
                    <li>Fenty Beauty Stunna Lip Paint - Shade "Uncuffed"</li>
                    <li>Sephora Collection Cream Lip Stain - Shade "Blackberry Sorbet"</li>
                </ul>
            </article>
            <article>
                <h4>Rekomendasi untuk Undertone Dingin:</h4>
                <ul>
                    <li>NYX Professional Makeup Liquid Suede Cream Lipstick - Shade "Vintage"</li>
                    <li>Colourpop Ultra Matte Lip - Shade "Avenue"</li>
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
