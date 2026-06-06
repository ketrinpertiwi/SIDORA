<?php
$error = $_SESSION['error'] ?? null;
$success = $_SESSION['success'] ?? null;
unset($_SESSION['error'], $_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar RS - SIDORA</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/auth.css">
    </head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-box">
            <div class="auth-header">
                <h1>Daftar Rumah Sakit</h1>
                <p class="subtitle">Buat akun rumah sakit untuk mengakses permintaan darah.</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <form method="POST" action="index.php?page=register-rs-process" class="register-form">
                <div class="form-group"><label>Nama Rumah Sakit</label><input type="text" name="nama_rs" placeholder="Nama Rumah Sakit" required></div>
                <div class="form-group"><label>Email</label><input type="email" name="email" placeholder="Email" required></div>
                <div class="form-group"><label>Password</label><input type="password" name="password" placeholder="Password" required></div>
                <div class="form-group"><label>Alamat</label><textarea name="alamat" placeholder="Alamat Rumah Sakit"></textarea></div>
                <button type="submit" class="btn btn-primary-sidora"><i data-lucide="user-plus"></i> <span>Daftar</span></button>
            </form>
            <div class="auth-footer">
                <p>Sudah punya akun? <a href="index.php?page=login">Login</a></p>
            </div>
        </div>
        <div class="auth-side">
            <div class="side-content">
                <h2>Akses fitur permintaan darah</h2>
                <p>Registrasi rumah sakit akan ditinjau admin sebelum aktif.</p>
            </div>
        </div>
    </div>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>


