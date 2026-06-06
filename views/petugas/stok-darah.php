<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Darah - SIDORA Petugas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard.css">
    <style>
        .stok-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--spacing-lg);
            margin-bottom: var(--spacing-2xl);
        }

        .stok-item {
            background: white;
            border-radius: var(--border-radius);
            padding: var(--spacing-lg);
            text-align: center;
            box-shadow: var(--shadow);
            border-top: 4px solid var(--primary-color);
        }

        .blood-type {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: var(--spacing-md);
        }

        .stok-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-gray);
            margin-bottom: var(--spacing-sm);
        }

        @media (max-width: 1024px) {
            .stok-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stok-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    </head>
<body>
    <div class="dashboard-layout">
        <nav class="navbar">
            <div class="navbar-left">
                <button class="navbar-toggle" id="sidebarToggle"></button>
                <span class="navbar-brand">SIDORA Petugas</span>
            </div>
            <div class="navbar-right">
                <div class="navbar-user">
                    <div class="user-avatar">PT</div>
                    <span>Petugas</span>
                    
                </div>
            </div>
        </nav>

        <aside class="sidebar" id="sidebar">
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="index.php?page=petugas-dashboard" class="sidebar-menu-link">
                        
                        
<i data-lucide="layout-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">MANAJEMEN DATA</li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=petugas-daftar-pendonor" class="sidebar-menu-link">
                        
                        
<i data-lucide="users"></i> <span>Daftar Pendonor</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=petugas-riwayat-donasi" class="sidebar-menu-link">
                        
                        
<i data-lucide="file-text"></i> <span>Riwayat Donasi</span>
                    </a>
                </li>

                <li class="sidebar-title">INFORMASI</li>
                
                <li class="sidebar-menu-item">
                    <a href="index.php?page=petugas-jadwal-donor" class="sidebar-menu-link">
                        
                        
<i data-lucide="calendar"></i> <span>Jadwal Donor</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=petugas-stok-darah" class="sidebar-menu-link active">
                        
                        
<i data-lucide="droplet"></i> <span>Stok Darah</span>
                    </a>
                </li>
                <li class="sidebar-divider" style="margin: 0;"></li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=logout" class="sidebar-menu-link">
                        
                        
<i data-lucide="log-out"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="page-header">
                <div class="breadcrumb">
                    <a href="index.php?page=petugas-dashboard">Dashboard</a>
                    <span>/</span>
                    <span>Stok Darah</span>
                </div>
                <div class="page-title">
                    <h1>Stok Darah Terkini</h1>
                </div>
            </div>

            <h3 style="margin-bottom: var(--spacing-lg);">Status Stok Semua Golongan Darah</h3>

            <div class="stok-grid">
                <?php 
                $bloodTypes = [
                    ['gol' => 'A', 'rh' => '+'],
                    ['gol' => 'A', 'rh' => '-'],
                    ['gol' => 'B', 'rh' => '+'],
                    ['gol' => 'B', 'rh' => '-'],
                    ['gol' => 'AB', 'rh' => '+'],
                    ['gol' => 'AB', 'rh' => '-'],
                    ['gol' => 'O', 'rh' => '+'],
                    ['gol' => 'O', 'rh' => '-'],
                ];

                $stockMap = [];
                if (!empty($stokList)) {
                    foreach ($stokList as $stok) {
                        $g = strtoupper($stok['golongan'] ?? $stok['golongan_darah'] ?? '');
                        $r = $stok['rhesus'] ?? $stok['rh'] ?? '';
                        $stockMap[$g . $r] = (int)($stok['quantity'] ?? $stok['jumlah'] ?? 0);
                    }
                }

                foreach ($bloodTypes as $bt): 
                    $gol = $bt['gol'];
                    $rh = $bt['rh'];
                    $key = $gol . $rh;
                    $qty = $stockMap[$key] ?? 0;
                    
                    $level = $qty >= 50 ? 'badge-success' : ($qty >= 30 ? 'badge-warning' : 'badge-danger');
                    
                    $color = 'var(--primary-color)';
                    if($key == 'O-') $color = 'var(--danger-color)';
                    elseif($key == 'A+') $color = '#0284c7';
                    elseif($key == 'A-') $color = 'var(--warning-color)';
                    elseif($key == 'B+') $color = '#16a34a';
                    elseif($key == 'B-') $color = '#f59e0b';
                    elseif($key == 'AB+') $color = '#8b5cf6';
                    elseif($key == 'AB-') $color = '#ec4899';
                ?>
                <div class="stok-item" style="border-top-color: <?= $color ?>;">
                    <div class="blood-type" style="color: <?= $color ?>;"><?= $key ?></div>
                    <div style="margin-bottom: var(--spacing-sm);">
                        <span class="stok-number" style="display:inline-block; margin-bottom:0;"><?= $qty ?></span>
                        <span style="color: var(--gray); font-size:1rem; font-weight:500;">Kantong</span>
                    </div>
                    <div>
                        <span class="badge <?= $level ?>">
                            <?php if ($level === 'badge-success'): ?>
                                Aman
                            <?php elseif ($level === 'badge-warning'): ?>
                                Rendah
                            <?php else: ?>
                                Kritis
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
        </main>
    </div>

    
    <div class="modal" id="detailStokModal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">
                <h2>Detail Stok</h2>
                <button class="modal-close" onclick="closeModal('detailStokModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div style="display: grid; grid-template-columns: 150px 1fr; gap: 10px; margin-bottom: 10px;">
                    <strong>Golongan Darah:</strong> <span id="dtl-gol"></span>
                    <strong>Stok Tersedia:</strong> <span id="dtl-qty"></span>
                    <strong>Status:</strong> <span id="dtl-status" class="badge"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-gray" onclick="closeModal('detailStokModal')"><i data-lucide="x"></i> <span>Tutup</span></button>
            </div>
        </div>
    </div>

    <style>
    .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center; overflow-y: auto; }
    .modal.active { display: flex; }
    .modal-content { background: white; border-radius: 8px; width: 90%; margin: auto; }
    .modal-header { padding: 16px; border-bottom: 1px solid 
    .modal-body { padding: 16px; max-height: 70vh; overflow-y: auto; }
    .modal-footer { padding: 16px; border-top: 1px solid 
    .badge { display: inline-block; padding: 0.35rem 0.75rem; border-radius: 999px; font-size: 0.8rem; font-weight: 600; }
    </style>

    <script>
        function openDetailStokModal(gol, qty) {
            document.getElementById('dtl-gol').textContent = gol;
            document.getElementById('dtl-qty').textContent = qty + ' kantong';
            
            let statusEl = document.getElementById('dtl-status');
            if (qty >= 80) { 
                statusEl.textContent = 'Aman';
                statusEl.style.backgroundColor = '#dcfce7';
                statusEl.style.color = '#166534';
            } else if (qty >= 50) {
                statusEl.textContent = 'Rendah';
                statusEl.style.backgroundColor = '#fef3c7';
                statusEl.style.color = '#92400e';
            } else {
                statusEl.textContent = 'Kritis';
                statusEl.style.backgroundColor = '#fee2e2';
                statusEl.style.color = '#991b1b';
            }

            document.getElementById('detailStokModal').classList.add('active');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
        }
    </script>
    <script src="assets/js/sidebar.js"></script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
