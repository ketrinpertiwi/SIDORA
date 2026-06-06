<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Donor - SIDORA Petugas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard.css">

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
                    <a href="index.php?page=petugas-jadwal-donor" class="sidebar-menu-link active">
                        
                        
<i data-lucide="calendar"></i> <span>Jadwal Donor</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=petugas-stok-darah" class="sidebar-menu-link">
                        
                        
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
                    <span>Jadwal Donor</span>
                </div>
                <div class="page-title">
                    <h1>Jadwal Kegiatan Donor Darah</h1>
                </div>
            </div>

            <div class="table-container" style="margin-top: var(--spacing-lg);">
                <div class="table-header">
                    <h3>Jadwal Donor Mendatang</h3>
                    <button class="btn btn-outline-sidora btn-small"><i data-lucide="file-output"></i> <span>Unduh</span></button>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                                <th>Target</th>
                                <th>Terdaftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($jadwalList)): $no=1; foreach ($jadwalList as $jadwal): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($jadwal['tanggal'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($jadwal['waktu_mulai'] ?? '-') ?> - <?= htmlspecialchars($jadwal['waktu_selesai'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($jadwal['lokasi'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($jadwal['target'] ?? '-') ?> orang</td>
                                <td><?= htmlspecialchars($jadwal['terdaftar'] ?? '0') ?> Peserta</td>
                                <td><span class="badge badge-warning"><i data-lucide="calendar"></i> Terjadwal</span></td>
                                <td>
                                    <button class="btn btn-outline-sidora btn-small" onclick='openDetailJadwalModal(<?= htmlspecialchars(json_encode($jadwal), ENT_QUOTES, "UTF-8") ?>)'>
                                        <i data-lucide="eye"></i> Lihat
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                            <tr><td colspan="8" style="text-align: center;">Belum ada jadwal donor.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card" style="margin-top: var(--spacing-2xl); background: linear-gradient(135deg, #dbeafe 0%, #cffafe 100%); border: none; padding: var(--spacing-lg); border-radius: var(--border-radius);">
                <h4 style="color: var(--primary-color); margin-top: 0;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Informasi Penting</h4>
                <ul style="color: var(--dark-gray); margin: 0; padding-left: 1.5rem;">
                    <li>Pastikan semua data pendonor terdaftar sebelum kegiatan donor dimulai</li>
                    <li>Siapkan peralatan dan formulir donor dengan lengkap</li>
                    <li>Catat riwayat donasi setiap pendonor secara terperinci</li>
                    <li>Lapor ke admin jika ada kendala atau perubahan jadwal</li>
                </ul>
            </div>
        </main>
    </div>

    
    <div class="modal" id="detailJadwalModal">
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h2>Detail Jadwal Donor</h2>
                <button class="modal-close" onclick="closeModal('detailJadwalModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div style="display: grid; grid-template-columns: 150px 1fr; gap: 10px; margin-bottom: 10px;">
                    <strong>Lokasi:</strong> <span id="j-lokasi"></span>
                    <strong>Tanggal:</strong> <span id="j-tanggal"></span>
                    <strong>Waktu:</strong> <span id="j-waktu"></span>
                    <strong>Target Pendaftar:</strong> <span id="j-target"></span>
                    <strong>Terdaftar:</strong> <span id="j-terdaftar"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-gray" onclick="closeModal('detailJadwalModal')"><i data-lucide="x"></i> <span>Tutup</span></button>
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
    </style>

    <script>
        function openDetailJadwalModal(data) {
            document.getElementById('j-lokasi').textContent = data.lokasi || '-';
            document.getElementById('j-tanggal').textContent = data.tanggal || '-';
            document.getElementById('j-waktu').textContent = (data.waktu_mulai || '-') + ' - ' + (data.waktu_selesai || '-');
            document.getElementById('j-target').textContent = (data.target || 0) + ' orang';
            document.getElementById('j-terdaftar').textContent = (data.terdaftar || 0) + ' orang';
            document.getElementById('detailJadwalModal').classList.add('active');
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
