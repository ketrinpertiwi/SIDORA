<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDORA - Sistem Informasi Donor Darah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <style>
        .navbar-public {
            background: 
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        .navbar-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 var(--spacing-lg);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-brand {
            font-size: 1.3rem;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .navbar-actions { display: flex; gap: 12px; }
        .btn-outline-white {
            background: transparent;
            color: white;
            border: 2px solid rgba(255,255,255,0.7);
            padding: 8px 20px;
            border-radius: var(--border-radius);
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
        }
        .btn-outline-white:hover {
            border-color: white;
            background: rgba(255,255,255,0.1);
            text-decoration: none;
            color: white;
        }

        
        .hero {
            background: 
            color: white;
            padding: 100px var(--spacing-lg);
            text-align: center;
            min-height: 340px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .hero h1 {
            color: white;
            font-size: 2.8rem;
            margin-bottom: var(--spacing-base);
            font-weight: 700;
        }
        .hero p {
            color: rgba(255,255,255,0.9);
            font-size: 1.05rem;
            max-width: 540px;
            margin: 0 auto var(--spacing-lg);
            line-height: 1.75;
        }
        .hero-btns { display: flex; justify-content: center; gap: 14px; flex-wrap: wrap; }
        .btn-light-hero {
            background: white;
            color: 
            font-weight: 600;
            padding: 10px 28px;
            border-radius: var(--border-radius);
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
            transition: var(--transition);
            border: 2px solid white;
        }
        .btn-light-hero:hover {
            background: transparent;
            color: white;
            text-decoration: none;
        }

        
        .features-section {
            padding: 70px var(--spacing-lg);
            background: var(--light-gray);
        }
        .section-title { text-align: center; margin-bottom: var(--spacing-2xl); }
        .section-title h2 { color: var(--dark-gray); }
        .section-title p  { color: var(--gray); margin: 0; }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--spacing-lg);
            max-width: 1000px;
            margin: 0 auto;
        }
        .feature-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: var(--spacing-lg) var(--spacing-md);
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }
        .feature-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.1); transform: translateY(-3px); }
        .feature-card .icon { font-size: 3rem; color: 
        .feature-card h3 { font-size: 18px; color: var(--dark-gray); margin-bottom: var(--spacing-sm); }
        .feature-card p  { color: var(--gray); font-size: 14px; line-height: 1.6; margin: 0; }

        
        .footer-pub {
            background: 
            color: rgba(255,255,255,0.5);
            text-align: center;
            padding: var(--spacing-lg);
            font-size: 14px;
        }
        .footer-pub p { margin: 0; }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .features-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <nav class="navbar-public">
        <div class="navbar-inner">
            <a href="index.php?page=auth-index" class="navbar-brand">
SIDORA
            </a>
            <div class="navbar-actions">
                <a href="index.php?page=login" class="btn-outline-white">Masuk</a>
                <a href="index.php?page=register-rs" class="btn btn-primary-sidora" style="padding: 8px 20px;">Daftar Rumah Sakit</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <h1>Selamat Datang di SIDORA</h1>
        <p>Sistem Informasi Donor Darah berbasis web untuk pengelolaan data pendonor, stok darah, dan permintaan secara terintegrasi.</p>
        <div class="hero-btns">
            <a href="index.php?page=login" class="btn-light-hero">Login Sistem</a>
            <a href="#features" class="btn-outline-white">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    <section id="features" class="features-section">
        <div class="section-title">
            <h2>Fitur Utama</h2>
            <p>Kemudahan dalam pengelolaan donor darah</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="icon"><i class="fa-solid fa-users"></i></div>
                <h3>Manajemen Pendonor</h3>
                <p>Kelola data pendonor dan riwayat donasi dengan mudah dan terstruktur.</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fa-solid fa-vial"></i></div>
                <h3>Monitoring Stok Darah</h3>
                <p>Pantau ketersediaan stok darah berbagai golongan secara real-time.</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fa-solid fa-truck-medical"></i></div>
                <h3>Permintaan Darah</h3>
                <p>Fasilitas bagi Rumah Sakit untuk mengajukan permintaan darah dengan cepat.</p>
            </div>
        </div>
    </section>

    <footer class="footer-pub">
        <p>&copy; 2026 SIDORA - Sistem Informasi Donor Darah. All rights reserved.</p>
    </footer>


    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
