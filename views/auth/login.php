<?php

$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIDORA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body class="auth-page">

    <div class="auth-container">
        <div class="auth-box">
            <div class="auth-header">
                <div class="logo">
</div>
                <h1>SIDORA</h1>
                <p class="subtitle">Sistem Informasi Donor Darah</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form class="login-form" id="loginForm" method="POST" action="index.php?page=login-process">
                <div class="form-group">
                    <label for="email" class="required">Username atau Email</label>
                    <input type="text" id="email" name="email" placeholder="Masukkan username atau email" required>
                    <span class="error" id="usernameError"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="required">Password</label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                        <button type="button" class="toggle-password" id="togglePassword" aria-label="Tampilkan password">
                            <i data-lucide="eye" id="iconEye"></i>
                            <i data-lucide="eye-off" id="iconEyeOff" style="display:none;"></i>
                        </button>
                    </div>
                    <span class="error" id="passwordError"></span>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe" style="margin-bottom:0;font-weight:normal;">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-primary-sidora btn-login" style="width: 100%;"><i data-lucide="log-in"></i> <span>Login</span></button>
            </form>

            <div class="auth-footer">
                <p class="text-muted">Belum punya akun? <a href="index.php?page=register-rs">Daftar sebagai Rumah Sakit</a></p>
                <p class="text-muted"><a href="#">Lupa password?</a></p>
            </div>
        </div>

        <div class="auth-side">
            <div class="side-content">
                <h2>Selamat Datang di SIDORA</h2>
                <p>Sistem Informasi Manajemen Donor Darah yang modern dan terintegrasi.</p>
                <div class="features">
                    <div class="feature-item">
                        <span class="feature-icon"><i data-lucide="check"></i></span>
                        <span>Pengelolaan data pendonor terpadu</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"><i data-lucide="check"></i></span>
                        <span>Monitoring stok darah real-time</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"><i data-lucide="check"></i></span>
                        <span>Proses permintaan darah yang efisien</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon"><i data-lucide="check"></i></span>
                        <span>Jadwal donor yang terorganisir</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="assets/js/auth.js"></script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>


