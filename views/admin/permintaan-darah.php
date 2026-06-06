<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Permintaan Darah - SIDORA Admin</title>
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

        .filter-group label { margin-bottom: var(--spacing-sm); }
        .filter-group input, .filter-group select { width: 100%; }

        .priority-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .priority-biasa { background-color: 
        .priority-segera { background-color: 
        .priority-darurat { background-color: 

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            overflow-y: auto;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: var(--border-radius);
            max-width: 600px;
            width: 90%;
            margin: auto;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            padding: var(--spacing-lg);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
        }

        .modal-body {
            padding: var(--spacing-lg);
            max-height: 70vh;
            overflow-y: auto;
        }

        .modal-footer {
            padding: var(--spacing-lg);
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: var(--spacing-md);
        }

        .form-group {
            margin-bottom: var(--spacing-lg);
        }

        .form-group label {
            display: block;
            margin-bottom: var(--spacing-sm);
            font-weight: 600;
            color: var(--dark);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .detail-item {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: var(--spacing-md);
            padding: var(--spacing-md) 0;
            border-bottom: 1px solid var(--light);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: var(--gray);
        }

        .detail-value {
            color: var(--dark);
        }
    </style>
    </head>
<body>
    <div class="dashboard-layout">
        <nav class="navbar">
            <div class="navbar-left">
                <button class="navbar-toggle" id="sidebarToggle"><i data-lucide="menu"></i></button>
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
                    <a href="index.php?page=admin-permintaan-darah" class="sidebar-menu-link active">
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
                    <span>Lihat Permintaan Darah</span>
                </div>
                <div class="page-title">
                    <h1>Permintaan Darah dari Rumah Sakit</h1>
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-group" style="flex: 2;">
                    <label for="searchPermintaan">Cari Permintaan</label>
                    <input type="text" id="searchPermintaan" placeholder="Nama RS, Pasien, No Permintaan...">
                </div>
                <div class="filter-group">
                    <label for="filterStatus">Status</label>
                    <select id="filterStatus">
                        <option value="">Semua Status</option>
                        <option value="Ditinjau">Ditinjau</option>
                        <option value="disetujui">Disetujui</option>
                        <option value="ditolak">Ditolak</option>
                        <option value="dikirim">Dikirim</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="filterPrioritas">Prioritas</label>
                    <select id="filterPrioritas">
                        <option value="">Semua Prioritas</option>
                        <option value="biasa">Biasa</option>
                        <option value="segera">Segera</option>
                        <option value="darurat">Darurat</option>
                    </select>
                </div>
                <button class="btn btn-outline-gray"><i data-lucide="rotate-ccw"></i> <span>Reset</span></button>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Daftar Permintaan</h3>
                    <button class="btn btn-outline btn-outline-sidora"><i data-lucide="file-output"></i> <span>Export</span></button>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rumah Sakit</th>
                                <th>Pasien</th>
                                <th>Darah</th>
                                <th>Jumlah</th>
                                <th>Prioritas</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($permintaan)): $no = 1; foreach ($permintaan as $item): ?>
                                <?php 
                                    $stat = strtolower($item['status'] ?? 'pending');
                                    
                                    $stat_display = $stat === 'pending' ? 'ditinjau' : $stat;
                                    $prio = $item['prioritas'] ?? 'normal';
                                    $prio = trim($prio) !== '' ? strtolower(trim($prio)) : 'normal';
                                    $prio_class = ($prio == 'darurat' || $prio == 'tinggi') ? 'priority-darurat' : (($prio == 'segera') ? 'priority-segera' : 'priority-biasa');
                                    $stat_class = ($stat == 'disetujui') ? 'badge-disetujui' : (($stat == 'ditolak') ? 'badge-ditolak' : (($stat == 'dikirim') ? 'badge-dikirim' : 'badge-ditinjau'));
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($item['rumah_sakit'] ?? '-') ?></td>
                                    <td><?= htmlspecialchars(!empty($item['keterangan']) ? $item['keterangan'] : '-') ?></td>
                                    <td><?= htmlspecialchars(($item['golongan'] ?? '-') . ($item['rhesus'] ?? '')) ?></td>
                                    <td><?= htmlspecialchars($item['detail_jumlah'] ?? '1') ?> Kantong</td>
                                    <td><span class="priority-badge <?= $prio_class ?>"><?= ucfirst($prio) ?></span></td>
                                    <td><span class="badge <?= $stat_class ?>"><?php if($stat == 'disetujui'): ?><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><polyline points="20 6 9 17 4 12"/></svg><?php elseif($stat == 'ditolak'): ?><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg><?php elseif($stat == 'dikirim'): ?><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg><?php else: ?><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><?php endif; ?> <?= ucfirst($stat) ?></span></td>
                                    <td><?= htmlspecialchars($item['tanggal'] ?? date('Y-m-d')) ?></td>
                                    <td>
                                        <?php if($stat == 'ditinjau' || $stat == 'pending'): ?>
                                            <a href="index.php?page=admin-terima-permintaan&id=<?= $item['id'] ?>" class="btn btn-success btn-small" onclick="return confirm('Terima permintaan ini?');">Terima</a>
                                            <button type="button" class="btn btn-danger btn-small" onclick="openTolakModal(<?= $item['id'] ?>)">Tolak</button>
                                        <?php elseif($stat == 'disetujui'): ?>
                                            <button type="button" class="btn btn-primary-sidora btn-small" onclick="openKirimModal(<?= $item['id'] ?>)"><i data-lucide="truck"></i> <span>Kirim</span></button>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-outline-sidora btn-small" onclick='openDetailModal(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, "UTF-8") ?>)'><i data-lucide="eye"></i> <span>Detail</span></button>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="9" style="text-align:center;">Belum ada permintaan darah.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <?php if (!empty($_SESSION['success'])): ?><div style="position:fixed;top:1rem;right:1rem;background:#d1fae5;color:#065f46;padding:0.8rem 1.5rem;border-radius:8px;z-index:9999;box-shadow:0 4px 12px rgba(0,0,0,0.1);"><?= htmlspecialchars($_SESSION['success']) ?></div><?php unset($_SESSION['success']); endif; ?>
    <?php if (!empty($_SESSION['error'])): ?><div style="position:fixed;top:1rem;right:1rem;background:#fee2e2;color:#991b1b;padding:0.8rem 1.5rem;border-radius:8px;z-index:9999;box-shadow:0 4px 12px rgba(0,0,0,0.1);"><?= htmlspecialchars($_SESSION['error']) ?></div><?php unset($_SESSION['error']); endif; ?>

    <div id="tolakModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tolak Permintaan</h2>
                <button type="button" class="modal-close" onclick="closeModal('tolakModal')">&times;</button>
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
                    <button type="button" class="btn btn-outline-gray" onclick="closeModal('tolakModal')"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-danger">Tolak Permintaan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="kirimModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Konfirmasi Pengiriman Darah</h2>
                <button class="modal-close" onclick="closeModal('kirimModal')">&times;</button>
            </div>
            <form action="index.php?page=admin-kirim-permintaan" method="POST">
                <input type="hidden" name="permintaan_id" id="kirimPermintaanId" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaKurir">Nama Kurir / Petugas Pengantar</label>
                        <input type="text" id="namaKurir" name="kurir" placeholder="Masukkan nama kurir atau petugas pengantar..." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" onclick="closeModal('kirimModal')"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-primary-sidora"><i data-lucide="save"></i> <span>Konfirmasi</span></button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="detailModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Permintaan</h2>
                <button class="modal-close" onclick="closeModal('detailModal')">&times;</button>
            </div>
            <div class="modal-body" id="detailBody">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-gray" onclick="closeModal('detailModal')"><i data-lucide="x"></i> <span>Tutup</span></button>
            </div>
        </div>
    </div>

    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/modals.js"></script>
    <script src="assets/js/table-actions.js"></script>
    <script>
        function openModal(id, permintaanId = null) {
            document.getElementById(id).classList.add('active');
            if(permintaanId) {
                const modal = document.getElementById(id);
                const input = modal.querySelector('input[name="permintaan_id"]');
                if(input) input.value = permintaanId;
            }
        }
        function openTolakModal(id) {
            document.getElementById('tolakId').value = id;
            openModal('tolakModal');
        }
        function openKirimModal(id) {
            document.getElementById('kirimPermintaanId').value = id;
            openModal('kirimModal');
        }
        function openDetailModal(data) {
            let status = data.status || 'Ditinjau';
            let statusClass = 'badge-info';
            if (status.toLowerCase() === 'ditolak') statusClass = 'badge-danger';
            else if (status.toLowerCase() === 'dikirim') statusClass = 'badge-success';
            else if (status.toLowerCase() === 'ditinjau' || status.toLowerCase() === 'pending') statusClass = 'badge-warning';

            let html = `
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">ID Permintaan</span>
                    #REQ-${data.id || '-'}
                </div>
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Tanggal Dibuat</span>
                    ${data.tanggal || data.created_at || '-'}
                </div>
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Rumah Sakit</span>
                    ${data.rumah_sakit || '-'}
                </div>
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Golongan Darah</span>
                    ${data.golongan || '-'}${data.rhesus || ''}
                </div>
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Jumlah Kantong</span>
                    ${data.detail_jumlah || data.jumlah || 0}
                </div>
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Keterangan / Prioritas RS</span>
                    ${data.keterangan || '-'} (Prioritas: ${data.prioritas || '-'})
                </div>
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Status</span>
                    <span class="badge ${statusClass}">${status}</span>
                </div>
            `;
            
            if (status.toLowerCase() === 'ditolak') {
                html += `
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Alasan Penolakan</span>
                    ${data.alasan_tolak || data.catatan || '-'}
                </div>`;
            } else if (status.toLowerCase() === 'dikirim') {
                html += `
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Kurir</span>
                    ${data.kurir || '-'}
                </div>
                <div style="margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                    <span style="font-weight: 600; color: #555; display: block; margin-bottom: 3px;">Tanggal Kirim</span>
                    ${data.tanggal_kirim || '-'}
                </div>`;
            }
            
            document.getElementById('detailBody').innerHTML = html;
            document.getElementById('detailModal').classList.add('active');
        }

        window.onclick = (event) => {
            if (event.target.classList.contains('modal')) {
                event.target.classList.remove('active');
            }
        }
    </script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
