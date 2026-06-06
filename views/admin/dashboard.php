<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SIDORA</title>
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
                <span class="navbar-brand">SIDORA Admin</span>
            </div>

            <div class="navbar-right">
                <div class="navbar-user" id="userMenuToggle">
                    <div class="user-avatar">AD</div>
                    <span>Admin</span>
                    
                </div>
            </div>
        </nav>

        <aside class="sidebar" id="sidebar">
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="index.php?page=admin-dashboard" class="sidebar-menu-link active">
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
                    <a href="index.php?page=admin-jadwal-donor" class="sidebar-menu-link">
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
                    <span>Beranda</span>
                </div>

                <div class="page-title">
                    <h1>Selamat Datang, Admin! </h1>
                    <a href="index.php?page=admin-export-semua" class="btn btn-primary-sidora">
Buat Laporan
                    </a>
                </div>
            </div>

            <div class="dashboard-grid">
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Total Pendonor</h3>
                        <p class="stat-value"><?= isset($statistics['pendonor']) ? number_format(intval($statistics['pendonor'])) : '0' ?></p>
                        <div class="stat-change positive">
12% dari bulan lalu
                        </div>
                    </div>
                    <div class="stat-icon primary"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Stok Darah Tersedia</h3>
                        <p class="stat-value"><?= isset($statistics['stok_total']) ? number_format(intval($statistics['stok_total'])) : '0' ?></p>
                        <div class="stat-change positive">
Terpenuhi
                        </div>
                    </div>
                    <div class="stat-icon success"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg></div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Permintaan Ditinjau</h3>
                        <p class="stat-value"><?= isset($statistics['permintaan']) ? number_format(intval($statistics['permintaan'])) : '0' ?></p>
                        <div class="stat-change negative">
Perlu Diproses
                        </div>
                    </div>
                    <div class="stat-icon warning"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Jadwal Donor Aktif</h3>
                        <p class="stat-value"><?= isset($statistics['jadwal']) ? number_format(intval($statistics['jadwal'])) : '0' ?></p>
                        <div class="stat-change positive">
Bulan Ini
                        </div>
                    </div>
                    <div class="stat-icon primary"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Petugas Aktif</h3>
                        <p class="stat-value"><?= isset($statistics['petugas']) ? number_format(intval($statistics['petugas'])) : '0' ?></p>
                        <div class="stat-change positive">
Online
                        </div>
                    </div>
                    <div class="stat-icon success"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Rumah Sakit Terdaftar</h3>
                        <p class="stat-value"><?= isset($statistics['rumahsakit']) ? number_format(intval($statistics['rumahsakit'])) : '0' ?></p>
                        <div class="stat-change positive">
Aktif Bertransaksi
                        </div>
                    </div>
                    <div class="stat-icon info"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/><line x1="12" y1="6" x2="12" y2="10"/><line x1="10" y1="8" x2="14" y2="8"/></svg></div>
                </div>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Permintaan Darah Terbaru</h3>
                    <div class="table-actions">
                        <a href="index.php?page=admin-export-permintaan" class="btn btn-outline btn-small">Export</a>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rumah Sakit</th>
                                <th>Golongan Darah</th>
                                <th>Jumlah</th>
                                <th>Tanggal Permintaan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($permintaan) && is_array($permintaan)): ?>
                                <?php $i=1; foreach ($permintaan as $p): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= htmlspecialchars($p['rumah_sakit'] ?? $p['name'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($p['golongan'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars( ($p['jumlah'] ?? 0) . ' kantong') ?></td>
                                        <td><?= htmlspecialchars($p['created_at'] ?? '-') ?></td>
                                        <?php 
                                            $status = $p['status'] ?? 'Pending';
                                            if ($status == 'Pending' || $status == 'pending' || $status == 'Ditinjau') {
                                                $labelStatus = 'Ditinjau';
                                                $badgeClass = 'badge-ditinjau';
                                            } elseif ($status == 'Disetujui' || $status == 'disetujui') {
                                                $labelStatus = 'Disetujui';
                                                $badgeClass = 'badge-disetujui';
                                            } elseif ($status == 'Ditolak' || $status == 'ditolak') {
                                                $labelStatus = 'Ditolak';
                                                $badgeClass = 'badge-ditolak';
                                            } elseif ($status == 'Dikirim' || $status == 'dikirim') {
                                                $labelStatus = 'Dikirim';
                                                $badgeClass = 'badge-dikirim';
                                            } else {
                                                $labelStatus = $status;
                                                $badgeClass = 'badge-ditinjau';
                                            }
                                        ?>
                                        <td>
                                            <span class="badge <?= $badgeClass ?>"><?= htmlspecialchars($labelStatus) ?></span>
                                        </td>
                                        <td>
                                            <div class="action-buttons" style="display:flex;gap:5px;flex-wrap:wrap;">
                                                <?php if ($labelStatus === 'Ditinjau'): ?>
                                                    <a href="index.php?page=admin-terima-permintaan&id=<?= $p['id'] ?>" class="btn btn-success" onclick="return confirm('Terima permintaan ini?');">
                                                        <i data-lucide="check"></i>
                                                        <span>Terima</span>
                                                    </a>
                                                    <button type="button" class="btn btn-danger" onclick="openTolakModal(<?= $p['id'] ?>)">
                                                        <i data-lucide="x"></i>
                                                        <span>Tolak</span>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-sidora" onclick='openDetailModal(<?= htmlspecialchars(json_encode($p), ENT_QUOTES, "UTF-8") ?>)'>
                                                        <i data-lucide="eye"></i>
                                                        <span>Detail</span>
                                                    </button>
                                                <?php elseif ($labelStatus === 'Disetujui'): ?>
                                                    <button type="button" class="btn btn-primary-sidora" onclick="openKirimModal(<?= $p['id'] ?>)">
                                                        <i data-lucide="truck"></i>
                                                        <span>Kirim</span>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-sidora" onclick='openDetailModal(<?= htmlspecialchars(json_encode($p), ENT_QUOTES, "UTF-8") ?>)'>
                                                        <i data-lucide="eye"></i>
                                                        <span>Detail</span>
                                                    </button>
                                                <?php elseif ($labelStatus === 'Ditolak' || $labelStatus === 'Dikirim'): ?>
                                                    <button type="button" class="btn btn-outline-sidora" onclick='openDetailModal(<?= htmlspecialchars(json_encode($p), ENT_QUOTES, "UTF-8") ?>)'>
                                                        <i data-lucide="eye"></i>
                                                        <span>Detail</span>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">Belum ada permintaan darah terbaru.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Status Stok Darah</h3>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Golongan Darah</th>
                                <th>Stok Tersedia</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($stokDarah)): ?>
                                <?php foreach ($stokDarah as $row): ?>
                                    <?php 
                                        $jml = intval($row['jumlah'] ?? 0);
                                        $minStock = 50;
                                        if ($jml < $minStock):
                                            $statusBadge = '<span class="badge badge-danger"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> Kritis</span>';
                                        else:
                                            $statusBadge = '<span class="badge badge-success"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><polyline points="20 6 9 17 4 12"/></svg> Aman</span>';
                                        endif;
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars(($row['golongan_darah'] ?? $row['golongan'] ?? '-') . ($row['rhesus'] ?? $row['rh'] ?? '')) ?></td>
                                        <td><?= htmlspecialchars($jml . ' kantong') ?></td>
                                        <td><?= $statusBadge ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">Belum ada data stok darah.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    
    <div id="tolakModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tolak Permintaan</h2>
                <button type="button" class="modal-close" onclick="closeModals()">&times;</button>
            </div>
            <form action="index.php?page=admin-tolak-permintaan" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="permintaan_id" id="tolakId">
                    <div class="form-group">
                        <label for="alasan">Alasan Penolakan</label>
                        <textarea name="alasan" id="alasan" required placeholder="Masukkan alasan menolak permintaan ini..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" onclick="closeModals()"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-danger">Tolak Permintaan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="kirimModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Kirim Permintaan</h2>
                <button type="button" class="modal-close" onclick="closeModals()">&times;</button>
            </div>
            <form action="index.php?page=admin-kirim-permintaan" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="permintaan_id" id="kirimId">
                    <div class="form-group">
                        <label for="kurir">Nama Kurir / Petugas Pengantar</label>
                        <input type="text" name="kurir" id="kurir" required placeholder="Masukkan nama kurir...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" onclick="closeModals()"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-primary-sidora">Konfirmasi Pengiriman</button>
                </div>
            </form>
        </div>
    </div>

    <div id="detailModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Permintaan</h2>
                <button type="button" class="modal-close" onclick="closeModals()">&times;</button>
            </div>
            <div class="modal-body" id="detailBody">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-gray" onclick="closeModals()"><i data-lucide="x"></i> <span>Tutup</span></button>
            </div>
        </div>
    </div>

    <style>
        .stat-icon.info {
            background-color: rgba(2, 132, 199, 0.1);
            color: var(--info-color);
        }

        
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .modal.active {
            display: flex;
        }
        .modal-content {
            background: 
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            position: relative;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .modal-close {
            background: none; border: none; font-size: 20px; cursor: pointer;
        }
        .modal-footer {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        .detail-row {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid 
        }
        .detail-label {
            font-weight: 600;
            color: 
            display: block;
            margin-bottom: 3px;
        }
    </style>
    <script src="assets/js/sidebar.js"></script>
    <script>
        function closeModals() {
            document.querySelectorAll('.modal').forEach(m => m.classList.remove('active'));
        }

        function openTolakModal(id) {
            document.getElementById('tolakId').value = id;
            document.getElementById('tolakModal').classList.add('active');
        }

        function openKirimModal(id) {
            document.getElementById('kirimId').value = id;
            document.getElementById('kirimModal').classList.add('active');
        }

        function openDetailModal(data) {
            let badgeClass = 'badge-ditinjau';
            let labelStatus = data.status || 'Pending';
            if (labelStatus === 'Pending' || labelStatus === 'pending' || labelStatus === 'Ditinjau') {
                labelStatus = 'Ditinjau';
                badgeClass = 'badge-ditinjau';
            } else if (labelStatus === 'Disetujui' || labelStatus === 'disetujui') {
                labelStatus = 'Disetujui';
                badgeClass = 'badge-disetujui';
            } else if (labelStatus === 'Ditolak' || labelStatus === 'ditolak') {
                labelStatus = 'Ditolak';
                badgeClass = 'badge-ditolak';
            } else if (labelStatus === 'Dikirim' || labelStatus === 'dikirim') {
                labelStatus = 'Dikirim';
                badgeClass = 'badge-dikirim';
            }

            let html = `
                <div class="detail-row"><span class="detail-label">ID Permintaan</span>#REQ-${data.id || '-'}</div>
                <div class="detail-row"><span class="detail-label">Tanggal Dibuat</span>${data.created_at || '-'}</div>
                <div class="detail-row"><span class="detail-label">Rumah Sakit</span>${data.rumah_sakit || '-'}</div>
                <div class="detail-row"><span class="detail-label">Golongan Darah</span>${data.golongan || '-'}${data.rhesus || ''}</div>
                <div class="detail-row"><span class="detail-label">Jumlah Kantong</span>${data.jumlah || 0}</div>
                <div class="detail-row"><span class="detail-label">Keterangan / Prioritas RS</span>${data.keterangan || '-' } (Prioritas: ${data.prioritas || '-'})</div>
                <div class="detail-row"><span class="detail-label">Status</span><span class="badge ${badgeClass}">${labelStatus}</span></div>
            `;
            
            if (data.status === 'Ditolak') {
                html += `<div class="detail-row"><span class="detail-label">Alasan Penolakan</span>${data.alasan_tolak || '-'}</div>`;
                html += `<div class="detail-row"><span class="detail-label">Tanggal Penolakan</span>${data.tanggal_tolak || '-'}</div>`;
            } else if (data.status === 'Dikirim') {
                html += `<div class="detail-row"><span class="detail-label">Kurir</span>${data.kurir || '-'}</div>`;
                html += `<div class="detail-row"><span class="detail-label">Tanggal Kirim</span>${data.tanggal_kirim || '-'}</div>`;
            }
            
            document.getElementById('detailBody').innerHTML = html;
            document.getElementById('detailModal').classList.add('active');
        }
    </script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
