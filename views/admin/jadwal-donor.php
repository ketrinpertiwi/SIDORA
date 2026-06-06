<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Donor - SIDORA Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard.css">
    <style>
        .jadwal-card {
            background: white;
            border-left: 4px solid var(--primary-color);
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            margin-bottom: var(--spacing-lg);
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: var(--spacing-lg);
        }

        .jadwal-info h4 {
            margin: 0 0 var(--spacing-sm) 0;
            color: var(--dark-gray);
        }

        .jadwal-info p {
            margin: 0 0 var(--spacing-sm) 0;
            color: var(--gray);
            font-size: 0.95rem;
        }

        @media (max-width: 1024px) {
            .jadwal-card {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .jadwal-card {
                grid-template-columns: 1fr;
            }
        }

        .jadwal-actions {
            display: flex;
            gap: var(--spacing-sm);
        }

        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; align-items: center; justify-content: center; overflow-y: auto; }
        .modal.active { display: flex; }
        .modal-content { background: white; border-radius: 8px; width: 90%; max-width: 500px; margin: auto; }
        .modal-header { padding: 16px; border-bottom: 1px solid 
        .modal-body { padding: 16px; max-height: 70vh; overflow-y: auto; }
        .modal-footer { padding: 16px; border-top: 1px solid 
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 500; }
        .form-group input { width: 100%; padding: 8px; border: 1px solid 
        .detail-row { display: flex; margin-bottom: 10px; border-bottom: 1px solid 
        .detail-label { font-weight: 600; width: 150px; flex-shrink: 0; }
    </style>
    </head>
<body>
    <div class="dashboard-layout">
        <nav class="navbar">
            <div class="navbar-left">
                <button class="navbar-toggle" id="sidebarToggle"></button>
                <span class="navbar-brand">SIDORA Admin</span>
            </div>
            <div class="navbar-right">
                <div class="navbar-user">
                    <div class="user-avatar">AD</div>
                    <span>Admin</span>
                    
                </div>
            </div>
        </nav>

        <aside class="sidebar" id="sidebar">
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="index.php?page=admin-dashboard" class="sidebar-menu-link">
                        <i data-lucide="layout-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">MANAJEMEN DATA</li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=admin-kelola-petugas" class="sidebar-menu-link">
                        <i data-lucide="users"></i> <span>Kelola Petugas</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=admin-jadwal-donor" class="sidebar-menu-link active">
                        <i data-lucide="calendar"></i> <span>Jadwal Donor</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=admin-stok-darah" class="sidebar-menu-link">
                        <i data-lucide="droplet"></i> <span>Stok Darah</span>
                    </a>
                </li>
                <li class="sidebar-title">PERMINTAAN DARAH</li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=admin-permintaan-darah" class="sidebar-menu-link">
                        <i data-lucide="file-text"></i> <span>Lihat Permintaan</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="index.php?page=admin-daftar-pendonor" class="sidebar-menu-link">
                        <i data-lucide="users"></i> <span>Lihat Daftar Pendonor</span>
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
                    <a href="index.php?page=admin-dashboard">Dashboard</a>
                    <span>/</span>
                    <span>Jadwal Donor</span>
                </div>
                <div class="page-title">
                    <h1>Kelola Jadwal Donor</h1>
                    <a href="index.php?page=admin-form-jadwal" class="btn btn-primary-sidora">
                        <i data-lucide="plus"></i> <span>Buat Jadwal</span>
                    </a>
                </div>
            </div>

            <div class="dashboard-grid">
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Total Jadwal</h3>
                        <p class="stat-value"><?= isset($statistics['jadwal']) ? number_format(intval($statistics['jadwal'])) : '0' ?></p>
                        <div class="stat-change positive"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><polyline points="20 6 9 17 4 12"/></svg> Aktif</div>
                    </div>
                    <div class="stat-icon primary"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Jadwal Bulan Ini</h3>
                        <p class="stat-value"><?= isset($statistics['jadwal_bulan']) ? number_format(intval($statistics['jadwal_bulan'])) : '0' ?></p>
                        <div class="stat-change positive"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="12" y1="19" x2="12" y2="5"/><polyline points="5 12 12 5 19 12"/></svg> Terjadwal</div>
                    </div>
                    <div class="stat-icon success"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Total Peserta</h3>
                        <p class="stat-value"><?= isset($statistics['peserta']) ? number_format(intval($statistics['peserta'])) : '0' ?></p>
                        <div class="stat-change positive"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> Mendaftar</div>
                    </div>
                    <div class="stat-icon warning"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
                </div>
            </div>



                <?php if (!empty($jadwalList)): foreach ($jadwalList as $jadwal): ?>
                <div class="jadwal-card">
                    <div class="jadwal-info">
                        <h4><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg> <?= htmlspecialchars($jadwal['lokasi'] ?? 'Lokasi') ?></h4>
                        <p><strong><?= htmlspecialchars($jadwal['tanggal'] ?? '-') ?></strong></p>
                        <p>Waktu Pelaksanaan: <?= htmlspecialchars($jadwal['waktu_mulai'] ?? '-') ?> - <?= htmlspecialchars($jadwal['waktu_selesai'] ?? '-') ?></p>
                        <p>Lokasi: <?= htmlspecialchars($jadwal['lokasi_detail'] ?? $jadwal['lokasi'] ?? '-') ?></p>
                    </div>
                    <div class="jadwal-info">
                        <h4><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> Peserta</h4>
                        <p>Target: <?= htmlspecialchars($jadwal['target'] ?? '0') ?> orang</p>
                        <p>Terdaftar: <?= htmlspecialchars($jadwal['terdaftar'] ?? '0') ?> orang</p>
                    </div>
                    <div class="jadwal-actions" style="display: flex; flex-direction: column; gap: var(--spacing-sm);">
                        <button type="button" class="btn btn-outline-sidora btn-small" onclick='openEditJadwalModal(<?= htmlspecialchars(json_encode($jadwal), ENT_QUOTES, "UTF-8") ?>)'>
                            <i data-lucide="pencil"></i> <span>Edit</span>
                        </button>
                        <button type="button" class="btn btn-outline-sidora btn-small" onclick='openDetailJadwalModal(<?= htmlspecialchars(json_encode($jadwal), ENT_QUOTES, "UTF-8") ?>)'>
                            <i data-lucide="eye"></i> <span>Detail</span>
                        </button>
                        <button type="button" class="btn btn-danger btn-small" onclick="if(confirm('Hapus jadwal ini?')) { document.getElementById('hapusJadwalId').value=<?= $jadwal['id'] ?>; document.getElementById('hapusJadwalForm').submit(); }">
                            <i data-lucide="trash-2"></i> <span>Hapus</span>
                        </button>
                    </div>
                </div>
                <?php endforeach; else: ?>
                <div class="card">
                    <p style="text-align: center;">Belum ada jadwal donor.</p>
                </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    
    <form id="hapusJadwalForm" method="POST" action="index.php?page=admin-hapus-jadwal" style="display:none;">
        <input type="hidden" name="id" id="hapusJadwalId">
    </form>

    
    <div class="modal" id="detailJadwalModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Jadwal Donor</h2>
                <button type="button" class="modal-close" onclick="closeModal('detailJadwalModal')">&times;</button>
            </div>
            <div class="modal-body" id="detailJadwalBody"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-gray" onclick="closeModal('detailJadwalModal')"><i data-lucide="x"></i> <span>Tutup</span></button>
            </div>
        </div>
    </div>

    
    <div class="modal" id="editJadwalModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Jadwal Donor</h2>
                <button type="button" class="modal-close" onclick="closeModal('editJadwalModal')">&times;</button>
            </div>
            <form method="POST" action="index.php?page=admin-edit-jadwal">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editJadwalId">
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" name="lokasi" id="editJadwalLokasi" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" id="editJadwalTanggal" required>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <div class="form-group">
                            <label>Waktu Mulai</label>
                            <input type="time" name="waktu_mulai" id="editJadwalWaktuMulai" required>
                        </div>
                        <div class="form-group">
                            <label>Waktu Selesai</label>
                            <input type="time" name="waktu_selesai" id="editJadwalWaktuSelesai" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Target Pendonor</label>
                        <input type="number" name="target" id="editJadwalTarget" min="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" onclick="closeModal('editJadwalModal')"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-primary-sidora"><i data-lucide="save"></i> <span>Simpan Perubahan</span></button>
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty($_SESSION['success'])): ?>
    <script>alert('<?= addslashes($_SESSION['success']) ?>'); <?php unset($_SESSION['success']); ?></script>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error'])): ?>
    <script>alert('Error: <?= addslashes($_SESSION['error']) ?>'); <?php unset($_SESSION['error']); ?></script>
    <?php endif; ?>

    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/modals.js"></script>
    <script>
        function openEditJadwalModal(data) {
            document.getElementById('editJadwalId').value     = data.id || '';
            document.getElementById('editJadwalLokasi').value  = data.lokasi || '';
            document.getElementById('editJadwalTanggal').value = data.tanggal || '';
            document.getElementById('editJadwalWaktuMulai').value = data.waktu_mulai || '';
            document.getElementById('editJadwalWaktuSelesai').value = data.waktu_selesai || '';
            document.getElementById('editJadwalTarget').value  = data.target || '';
            openModal('editJadwalModal');
        }
        function openDetailJadwalModal(data) {
            const html = `
                <div class="detail-row"><span class="detail-label">Lokasi</span>${data.lokasi || '-'}</div>
                <div class="detail-row"><span class="detail-label">Tanggal</span>${data.tanggal || '-'}</div>
                <div class="detail-row"><span class="detail-label">Waktu</span>${data.waktu_mulai || '-'} s.d. ${data.waktu_selesai || '-'}</div>
                <div class="detail-row"><span class="detail-label">Target</span>${data.target || 0} orang</div>
                <div class="detail-row"><span class="detail-label">Terdaftar</span>${data.terdaftar || 0} orang</div>
                <div class="detail-row"><span class="detail-label">Status</span>${data.status || '-'}</div>
                <div class="detail-row"><span class="detail-label">Catatan</span>${data.catatan || '-'}</div>
            `;
            document.getElementById('detailJadwalBody').innerHTML = html;
            openModal('detailJadwalModal');
        }
    </script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
