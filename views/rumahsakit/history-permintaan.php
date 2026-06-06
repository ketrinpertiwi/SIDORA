<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Permintaan - SIDORA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard.css">
    <style>
        .filter-section {
            background: white;
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            margin-bottom: var(--spacing-lg);
            display: flex;
            gap: var(--spacing-md);
            flex-wrap: wrap;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 150px;
        }

        .filter-group label {
            margin-bottom: var(--spacing-sm);
        }

        .filter-group input,
        .filter-group select {
            width: 100%;
        }


    </style>
    </head>
<body>
    <div class="dashboard-layout">
        <nav class="navbar">
            <div class="navbar-left">
                <button class="navbar-toggle" id="sidebarToggle"></button>
                <span class="navbar-brand">SIDORA Rumah Sakit</span>
            </div>
            <div class="navbar-right">
                <div class="navbar-user">
                    <div class="user-avatar">RS</div>
                    <span>Rumah Sakit</span>
                    
                </div>
            </div>
        </nav>

        <aside class="sidebar" id="sidebar">
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="index.php?page=rs-dashboard" class="sidebar-menu-link">
                        
                        
<i data-lucide="layout-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">PERMINTAAN DARAH</li>
                
                <li class="sidebar-menu-item">
                    <a href="index.php?page=rs-permintaan" class="sidebar-menu-link">
                        
                        
<i data-lucide="file-plus"></i> <span>Ajukan Permintaan</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="index.php?page=rs-history-permintaan" class="sidebar-menu-link active">
                        
                        
<i data-lucide="file-text"></i> <span>Riwayat Permintaan</span>
                    </a>
                </li>

                <li class="sidebar-title">INFORMASI</li>
                
                <li class="sidebar-menu-item">
                    <a href="index.php?page=rs-stok-darah" class="sidebar-menu-link">
                        
                        
<i data-lucide="droplet"></i> <span>Lihat Stok Darah</span>
                    </a>
                </li>

                <li class="sidebar-title" id="pengaturanTitle">PENGATURAN</li>
                
                <li class="sidebar-menu-item" id="profilMenuItem">
                    <a href="index.php?page=rs-profil" class="sidebar-menu-link">
                        
                        
<i data-lucide="user"></i> <span>Profil</span>
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
                    <a href="index.php?page=rs-dashboard">Dashboard</a>
                    <span>/</span>
                    <span>Riwayat Permintaan</span>
                </div>
                <div class="page-title">
                    <h1>Riwayat Permintaan Darah</h1>
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-group" style="flex: 2; min-width: 200px;">
                    <label for="searchHistory">Cari Permintaan</label>
                    <input type="text" id="searchHistory" placeholder="No. Pasien, Golongan Darah..." class="form-control">
                </div>
                <div class="filter-group">
                    <label for="filterStatus">Status</label>
                    <select id="filterStatus" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="filterTanggal">Periode</label>
                    <input type="date" id="filterTanggal" class="form-control">
                </div>
                <button class="btn btn-outline-gray"><i data-lucide="rotate-ccw"></i> <span>Reset</span></button>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Riwayat Permintaan Lengkap</h3>
                    <button class="btn btn-outline btn-outline-sidora"><i data-lucide="file-output"></i> <span>Export</span></button>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pasien</th>
                                <th>Ruangan</th>
                                <th>Darah</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($permintaanList)): $no=1; foreach ($permintaanList as $permintaan): 
                                $statusClass = 'badge-warning';
                                $statusIcon = '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>';
                                if (strtolower($permintaan['status']) == 'disetujui' || strtolower($permintaan['status']) == 'approved') {
                                    $statusClass = 'badge-success';
                                    $statusIcon = '<polyline points="20 6 9 17 4 12"/>';
                                } elseif (strtolower($permintaan['status']) == 'ditolak' || strtolower($permintaan['status']) == 'rejected') {
                                    $statusClass = 'badge-danger';
                                    $statusIcon = '<line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>';
                                } elseif (strtolower($permintaan['status']) == 'dikirim' || strtolower($permintaan['status']) == 'sent') {
                                    $statusClass = 'badge-success';
                                    $statusIcon = '<rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>';
                                }

                                
                                
                                $keterangan = $permintaan['keterangan'] ?? '';
                                $pasien = '-';
                                $ruangan = '-';
                                $darah = '-';
                                $jumlah = '-';
                                
                                if (preg_match('/Pasien:\s*(.*?)\s*\((.*?)\)/', $keterangan, $matches)) {
                                    $pasien = htmlspecialchars($matches[1]);
                                    $ruangan = htmlspecialchars($matches[2]);
                                }
                                if (preg_match('/Golongan:\s*([A-Z]+)\s*([+-])/', $keterangan, $matches)) {
                                    $darah = htmlspecialchars($matches[1] . $matches[2]);
                                }
                                if (preg_match('/Jumlah:\s*(\d+)/', $keterangan, $matches)) {
                                    $jumlah = htmlspecialchars($matches[1] . ' kantong');
                                }
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($permintaan['created_at'] ?? '-') ?></td>
                                <td><?= $pasien ?></td>
                                <td><?= $ruangan ?></td>
                                <td><?= htmlspecialchars($permintaan['golongan'] ?? '-') ?> <?= htmlspecialchars($permintaan['rhesus'] ?? '') ?></td>
                                <td><?= htmlspecialchars($permintaan['detail_jumlah'] ?? $permintaan['jumlah'] ?? '0') ?> kantong</td>
                                <td><span class="badge <?= $statusClass ?>"><?= htmlspecialchars($permintaan['status']) ?></span></td>
                                <td>
                                    <button class="btn btn-outline btn-small" onclick='openDetailPermintaanModal(<?= htmlspecialchars(json_encode($permintaan), ENT_QUOTES, "UTF-8") ?>)'>
                                        <i data-lucide="eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                            <tr><td colspan="8" style="text-align: center;">Belum ada riwayat permintaan darah.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    
    <div class="modal" id="detailPermintaanModal">
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h2>Detail Permintaan Darah</h2>
                <button class="modal-close" onclick="closeModal('detailPermintaanModal')">&times;</button>
            </div>
            <div class="modal-body" id="detailBodyRS">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-gray" onclick="closeModal('detailPermintaanModal')"><i data-lucide="x"></i> <span>Tutup</span></button>
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
    .detail-row { margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid 
    .detail-label { font-weight: 600; color: 

    </style>

    <script>
        function openDetailPermintaanModal(data) {
            let statusClass = 'badge-warning';
            if(data.status === 'Disetujui' || data.status === 'Dikirim') statusClass = 'badge-success';
            else if(data.status === 'Ditolak') statusClass = 'badge-danger';

            let html = `
                <div class="detail-row"><span class="detail-label">Golongan Darah</span>${data.golongan || '-'} ${data.rhesus || ''}</div>
                <div class="detail-row"><span class="detail-label">Jumlah Kantong</span>${data.detail_jumlah || data.jumlah || 0} Kantong</div>
                <div class="detail-row"><span class="detail-label">Status</span><span class="badge ${statusClass}">${data.status || 'Pending'}</span></div>
                <div class="detail-row"><span class="detail-label">Keterangan / Prioritas</span>${data.keterangan || '-'} (Prioritas: ${data.prioritas || '-'})</div>
            `;
            
            if (data.status === 'Ditolak') {
                html += `<div class="detail-row"><span class="detail-label">Alasan Penolakan</span>${data.alasan_tolak || '-'}</div>`;
                html += `<div class="detail-row"><span class="detail-label">Tanggal Penolakan</span>${data.tanggal_tolak || '-'}</div>`;
            } else if (data.status === 'Dikirim') {
                html += `<div class="detail-row"><span class="detail-label">Kurir</span>${data.kurir || '-'}</div>`;
                html += `<div class="detail-row"><span class="detail-label">Tanggal Kirim</span>${data.tanggal_kirim || '-'}</div>`;
            }
            
            document.getElementById('detailBodyRS').innerHTML = html;
            document.getElementById('detailPermintaanModal').classList.add('active');
        }
        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
        }
    </script>
    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/modals.js"></script>
    <script src="assets/js/table-actions.js"></script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
