<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

$error_message = '';
$success_message = '';

if (isset($_GET['status']) && $_GET['status'] === 'logout_success') {
    $success_message = "Anda telah berhasil logout.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password087') {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error_message = "Username atau password yang Anda masukkan salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lipstick Recommender</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header>
        <h1>Login ke Akun Anda</h1>
        <p>Silakan masuk untuk melanjutkan.</p>
    </header>
    <main>
        <section style="max-width: 500px; margin: 2rem auto;">
            <h2>Formulir Login</h2>

            <?php if (!empty($error_message)): ?>
                <p style="color: red; text-align: center; background-color: #ffdddd; padding: 10px; border-radius: 5px;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <?php if (!empty($success_message)): ?>
                <p style="color: green; text-align: center; background-color: #ddffdd; padding: 10px; border-radius: 5px;"><?php echo $success_message; ?></p>
            <?php endif; ?>

            <form action="login.php" method="POST" id="recommenderForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border-color);">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" required>
                        <i class="fa-solid fa-eye" id="togglePassword"></i>
                    </div>
                </div>
                
                <button type="submit" id="submitRecommendation">Login</button>
            </form>
            <p style="text-align: center; margin-top: 2rem;"><a href="index.php">Kembali ke Beranda</a></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Lipstick Recommender.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>