<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Daftar Pendonor - SIDORA Admin</title>
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
                    <a href="index.php?page=admin-permintaan-darah" class="sidebar-menu-link">
                        <i data-lucide="file-text"></i> <span>Lihat Permintaan</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="index.php?page=admin-daftar-pendonor" class="sidebar-menu-link active">
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
                    <span>Lihat Daftar Pendonor</span>
                </div>

                <div class="page-title">
                    <h1>Daftar Pendonor (Read Only)</h1>
                </div>
            </div>

            <form action="index.php" method="GET" class="filter-section">
                <input type="hidden" name="page" value="admin-daftar-pendonor">
                <div class="filter-group" style="flex: 2; min-width: 200px;">
                    <label for="searchPendonor">Cari Pendonor</label>
                    <input type="text" id="searchPendonor" name="search" placeholder="Nama, No. Identitas, No. Telepon..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                </div>

                <div class="filter-group">
                    <label for="filterGolDarah">Golongan Darah</label>
                    <select id="filterGolDarah" name="golongan">
                        <option value="">Semua</option>
                        <option value="A" <?= (isset($_GET['golongan']) && $_GET['golongan'] == 'A') ? 'selected' : '' ?>>A</option>
                        <option value="B" <?= (isset($_GET['golongan']) && $_GET['golongan'] == 'B') ? 'selected' : '' ?>>B</option>
                        <option value="AB" <?= (isset($_GET['golongan']) && $_GET['golongan'] == 'AB') ? 'selected' : '' ?>>AB</option>
                        <option value="O" <?= (isset($_GET['golongan']) && $_GET['golongan'] == 'O') ? 'selected' : '' ?>>O</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="filterStatus">Status</label>
                    <select id="filterStatus" name="status">
                        <option value="">Semua Status</option>
                        <option value="aktif" <?= (isset($_GET['status']) && $_GET['status'] == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                        <option value="nonaktif" <?= (isset($_GET['status']) && $_GET['status'] == 'nonaktif') ? 'selected' : '' ?>>Non-aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-sidora"><i data-lucide="funnel"></i> <span>Filter</span></button>
            </form>

            <div class="table-container">
                <div class="table-header">
                    <h3>Data Pendonor Terdaftar</h3>
                    <div class="table-actions">
                        <button class="btn btn-outline btn-outline-sidora"><i data-lucide="file-output"></i> <span>Export</span></button>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>No. Identitas</th>
                                <th>Jenis Kelamin</th>
                                <th>Golongan Darah</th>
                                <th>Rhesus</th>
                                <th>No. Telepon</th>
                                <th>Status</th>
                                <th>Terakhir Donor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pendonorList)): $no = 1; foreach ($pendonorList as $pendonor): ?>
                                <?php 
                                    $gol = $pendonor['golongan'] ?? '';
                                    $bgCol = 'transparent'; $txCol = '#000';
                                    if($gol == 'O') { $bgCol = '#dcfce7'; $txCol = '#166534'; }
                                    elseif($gol == 'A') { $bgCol = '#fee2e2'; $txCol = '#991b1b'; }
                                    elseif($gol == 'B') { $bgCol = '#cffafe'; $txCol = '#164e63'; }
                                    elseif($gol == 'AB') { $bgCol = '#e0e7ff'; $txCol = '#3730a3'; }
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars(!empty($pendonor['nama']) ? $pendonor['nama'] : '-') ?></td>
                                    <td><?= htmlspecialchars(!empty($pendonor['nik']) ? $pendonor['nik'] : '-') ?></td>
                                    <td><?= htmlspecialchars(!empty($pendonor['jenis_kelamin']) ? $pendonor['jenis_kelamin'] : '-') ?></td>
                                    <td><span style="background: <?= $bgCol ?>; padding: 4px 10px; border-radius: 4px; color: <?= $txCol ?>; font-weight: 600; font-size: 12px;"><?= htmlspecialchars(!empty($pendonor['golongan']) ? $pendonor['golongan'] : '-') ?></span></td>
                                    <td><?= htmlspecialchars(!empty($pendonor['rhesus']) ? $pendonor['rhesus'] : '-') ?></td>
                                    <td><?= htmlspecialchars(!empty($pendonor['telepon']) ? $pendonor['telepon'] : '-') ?></td>
                                    <td>
                                        <?php if((!empty($pendonor['status']) && $pendonor['status']=='aktif') || (!isset($pendonor['status']))): ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php else: ?>
                                            <span class="badge badge-warning">Non-aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars(!empty($pendonor['terakhir_donor']) ? $pendonor['terakhir_donor'] : (!empty($pendonor['tgl_donor']) ? $pendonor['tgl_donor'] : '-')) ?></td>
                                    <td>
                                        <button class="btn btn-outline-sidora btn-small" onclick='openDetailPendonorModal(<?= htmlspecialchars(json_encode($pendonor), ENT_QUOTES, "UTF-8") ?>)'>
                                            <i data-lucide="eye"></i> <span>Detail</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="9" style="text-align:center;">Belum ada data pendonor.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    
    <div class="modal" id="detailPendonorModal">
        <div class="modal-content" style="max-width: 500px;">
            <div class="modal-header">
                <h2>Detail Pendonor</h2>
                <button class="modal-close" onclick="closeModal('detailPendonorModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div style="display: grid; grid-template-columns: 150px 1fr; gap: 10px; margin-bottom: 10px;" id="pendonorDetailContent">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-gray" onclick="closeModal('detailPendonorModal')"><i data-lucide="x"></i> <span>Tutup</span></button>
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
        function openDetailPendonorModal(data) {
            const html = `
                <strong>Nama Lengkap:</strong> <span>${data.nama || '-'}</span>
                <strong>No. Identitas:</strong> <span>${data.nik || '-'}</span>
                <strong>Jenis Kelamin:</strong> <span>${data.jenis_kelamin || '-'}</span>
                <strong>Tanggal Lahir:</strong> <span>${data.tanggal_lahir || data.tgl_lahir || '-'}</span>
                <strong>Gol. Darah:</strong> <span>${data.golongan || '-'}${data.rhesus || ''}</span>
                <strong>No. Telepon:</strong> <span>${data.telepon || '-'}</span>
                <strong>Alamat:</strong> <span>${data.alamat || '-'}</span>
                <strong>Status:</strong> <span>${data.status || 'Aktif'}</span>
                <strong>Terakhir Donor:</strong> <span>${data.terakhir_donor || data.tgl_donor || '-'}</span>
                <strong>Riwayat Donor:</strong> <span>${data.riwayat_donor || '-'}</span>
            `;
            document.getElementById('pendonorDetailContent').innerHTML = html;
            document.getElementById('detailPendonorModal').classList.add('active');
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
