<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Donasi - SIDORA Petugas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard.css">
    <style>
        .badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
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
                    <a href="index.php?page=petugas-riwayat-donasi" class="sidebar-menu-link active">
                        
                        
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
                    <span>Riwayat Donasi</span>
                </div>
                <div class="page-title">
                    <h1>Riwayat Donasi</h1>
                </div>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Daftar Riwayat Donasi</h3>
                    <div style="display:flex;gap:var(--spacing-sm);align-items:center;">
                        <form action="index.php" method="GET" style="display: flex; gap: var(--spacing-md); align-items: center;">
                        <input type="hidden" name="page" value="petugas-riwayat-donasi">
                        <select name="status" class="form-control" style="width: 150px;">
                            <option value="">Semua Status</option>
                            <option value="Berhasil" <?= (isset($_GET['status']) && $_GET['status'] == 'Berhasil') ? 'selected' : '' ?>>Berhasil</option>
                            <option value="Ditolak" <?= (isset($_GET['status']) && $_GET['status'] == 'Ditolak') ? 'selected' : '' ?>>Ditolak</option>
                        </select>
                        <input type="date" name="tanggal" class="form-control" style="width: 150px;" value="<?= htmlspecialchars($_GET['tanggal'] ?? '') ?>">
                        <button type="submit" class="btn btn-outline btn-outline-sidora"><i data-lucide="funnel"></i> <span>Filter</span></button>
                    </form>
                        <button type="button" class="btn btn-outline btn-outline-sidora" onclick="exportTableToCSV('tabelRiwayat','Riwayat_Donasi.csv')"><i data-lucide="file-output"></i> <span>Export CSV</span></button>
                    </div>
                </div>
                <?php if (!empty($_SESSION['success'])): ?><div style="background:#d1fae5;color:#065f46;padding:0.7rem 1rem;border-radius:8px;margin-bottom:1rem;"><?= htmlspecialchars($_SESSION['success']) ?></div><?php unset($_SESSION['success']); endif; ?>
                <?php if (!empty($_SESSION['error'])): ?><div style="background:#fee2e2;color:#991b1b;padding:0.7rem 1rem;border-radius:8px;margin-bottom:1rem;"><?= htmlspecialchars($_SESSION['error']) ?></div><?php unset($_SESSION['error']); endif; ?>
                <div class="table-wrapper">
                    <table id="tabelRiwayat">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Pendonor</th>
                                <th>Golongan Darah</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($riwayatList)): $no=1; foreach ($riwayatList as $riwayat): ?>
                            <?php 
                                $status = $riwayat['status'] ?? 'Berhasil';
                                $statusClass = $status == 'Berhasil' ? 'var(--success-color)' : 'var(--danger-color)';
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($riwayat['tanggal'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($riwayat['nama_pendonor'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($riwayat['golongan'] ?? '-') ?> <?= htmlspecialchars($riwayat['rhesus'] ?? '') ?></td>
                                <td><?= htmlspecialchars($riwayat['jumlah'] ?? '1') ?> kantong</td>
                                <td><span class="badge badge-status" style="background: <?= $statusClass ?>; color: white;"><?= htmlspecialchars($status) ?></span></td>
                                <td>
                                    <div style="display:flex;gap:4px;">
                                    <button type="button" class="btn btn-outline btn-small" onclick='openDetailRiwayatModal(<?= htmlspecialchars(json_encode($riwayat), ENT_QUOTES, "UTF-8") ?>)'>
Lihat
                                    </button>
                                    <button type="button" class="btn btn-danger btn-small" onclick="if(confirm('Hapus riwayat ini? Stok darah akan dikurangi jika status Berhasil.')){ document.getElementById('hapusRiwayatId').value=<?= $riwayat['id'] ?>;document.getElementById('hapusRiwayatForm').submit(); }">
Hapus
                                    </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                            <tr><td colspan="8" style="text-align: center;">Belum ada riwayat donasi.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    
    <div class="modal" id="detailRiwayatModal">
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h2>Detail Riwayat Donasi</h2>
                <button class="modal-close" onclick="closeModal('detailRiwayatModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div style="display: grid; grid-template-columns: 150px 1fr; gap: 10px; margin-bottom: 10px;">
                    <strong>Nama Pendonor:</strong> <span id="mdl-nama"></span>
                    <strong>Tanggal Donasi:</strong> <span id="mdl-tanggal"></span>
                    <strong>Gol. Darah:</strong> <span id="mdl-gol"></span>
                    <strong>Tekanan Darah:</strong> <span id="mdl-td"></span>
                    <strong>Volume (ml):</strong> <span id="mdl-vol"></span>
                    <strong>Status:</strong> <span id="mdl-status"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-gray" onclick="closeModal('detailRiwayatModal')"><i data-lucide="x"></i> <span>Tutup</span></button>
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
        function openDetailRiwayatModal(nama, tanggal, gol, td, vol, status) {
            document.getElementById('mdl-nama').textContent = nama;
            document.getElementById('mdl-tanggal').textContent = tanggal;
            document.getElementById('mdl-gol').textContent = gol;
            document.getElementById('mdl-td').textContent = td;
            document.getElementById('mdl-vol').textContent = vol;
            document.getElementById('mdl-status').textContent = status;
            document.getElementById('detailRiwayatModal').classList.add('active');
        }
        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
        }
    </script>
    
    <form id="hapusRiwayatForm" method="POST" action="index.php?page=petugas-hapus-riwayat" style="display:none;">
        <input type="hidden" name="id" id="hapusRiwayatId">
    </form>

    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/modals.js"></script>
    <script src="assets/js/table-actions.js"></script>
    <script>
        function openDetailRiwayatModal(data) {
            
            if (typeof data === 'string') {
                const args = arguments;
                document.getElementById('mdl-nama').textContent    = args[0] || '-';
                document.getElementById('mdl-tanggal').textContent = args[1] || '-';
                document.getElementById('mdl-gol').textContent     = args[2] || '-';
                document.getElementById('mdl-td').textContent      = args[3] || '-';
                document.getElementById('mdl-vol').textContent     = args[4] || '-';
                document.getElementById('mdl-status').textContent  = args[5] || '-';
            } else {
                document.getElementById('mdl-nama').textContent    = data.nama_pendonor || '-';
                document.getElementById('mdl-tanggal').textContent = data.tanggal || '-';
                document.getElementById('mdl-gol').textContent     = (data.golongan||'-')+(data.rhesus||'');
                document.getElementById('mdl-td').textContent      = data.tekanan_darah || '-';
                document.getElementById('mdl-vol').textContent     = ((parseInt(data.jumlah)||1)*450)+' ml';
                document.getElementById('mdl-status').textContent  = data.status || '-';
            }
            document.getElementById('detailRiwayatModal').classList.add('active');
        }
    </script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
