<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendonor - SIDORA Petugas</title>
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

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--spacing-md);
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        .badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-success {
            background-color: 
            color: 
        }

        .info {
            background: white;
            padding: var(--spacing-lg);
            border-radius: var(--border-radius);
            border-left: 4px solid var(--info-color);
            margin-bottom: var(--spacing-lg);
        }

        .btn-info {
            background-color: var(--info-color);
            color: white;
        }

        .btn-info:hover:not(:disabled) {
            background-color: 
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
                    <a href="index.php?page=petugas-daftar-pendonor" class="sidebar-menu-link active">
                        
                        
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
                    <span>Daftar Pendonor</span>
                </div>

                <div class="page-title">
                    <h1>Daftar Pendonor</h1>
                    <button class="btn btn-primary-sidora" id="tambahPendonorBtn">Tambah Pendonor
                    </button>
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-group" style="flex: 2; min-width: 200px;">
                    <label for="searchPendonor">Cari Pendonor</label>
                    <input type="text" id="searchPendonor" placeholder="Nama, No. Identitas, No. Telepon...">
                </div>

                <div class="filter-group">
                    <label for="filterGolDarah">Golongan Darah</label>
                    <select id="filterGolDarah">
                        <option value="">Semua</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="filterStatus">Status</label>
                    <select id="filterStatus">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-aktif</option>
                    </select>
                </div>

                <button class="btn btn-outline-gray"><i data-lucide="rotate-ccw"></i> <span>Reset</span></button>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Data Pendonor Terdaftar</h3>
                    <div class="table-actions">
                        <button type="button" class="btn btn-outline btn-outline-sidora" onclick="exportTableToCSV('tabelPendonor','Pendonor_SIDORA.csv')"><i data-lucide="file-output"></i> <span>Export CSV</span></button>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table id="tabelPendonor">
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
                            <?php if (!empty($pendonorList)): $no=1; foreach ($pendonorList as $pendonor): 
                                $gol = strtoupper($pendonor['golongan'] ?? '-');
                                $color = 'var(--primary-color)';
                                if($gol == 'O') $color = '#166534';
                                elseif($gol == 'A') $color = '#991b1b';
                                elseif($gol == 'B') $color = '#164e63';
                                elseif($gol == 'AB') $color = '#3730a3';
                                
                                $bg = '#f3f4f6';
                                if($gol == 'O') $bg = '#dcfce7';
                                elseif($gol == 'A') $bg = '#fee2e2';
                                elseif($gol == 'B') $bg = '#cffafe';
                                elseif($gol == 'AB') $bg = '#e0e7ff';
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars(!empty($pendonor['nama']) ? $pendonor['nama'] : '-') ?></td>
                                <td><?= htmlspecialchars(!empty($pendonor['nik']) ? $pendonor['nik'] : '-') ?></td>
                                <td><?= htmlspecialchars(!empty($pendonor['jenis_kelamin']) ? $pendonor['jenis_kelamin'] : '-') ?></td>
                                <td><span style="background: <?= $bg ?>; padding: 4px 10px; border-radius: 4px; color: <?= $color ?>; font-weight: 600; font-size: 12px;"><?= htmlspecialchars(!empty($pendonor['golongan']) ? $pendonor['golongan'] : '-') ?></span></td>
                                <td><?= htmlspecialchars(!empty($pendonor['rhesus']) ? $pendonor['rhesus'] : '-') ?></td>
                                <td><?= htmlspecialchars(!empty($pendonor['telepon']) ? $pendonor['telepon'] : '-') ?></td>
                                <td><?php $s=$pendonor['status']??'aktif'; echo $s==='aktif' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-warning">Non-aktif</span>'; ?></td>
                                <td><?= htmlspecialchars(!empty($pendonor['terakhir_donor']) ? $pendonor['terakhir_donor'] : (!empty($pendonor['tgl_donor']) ? $pendonor['tgl_donor'] : '-')) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <button type="button" class="btn btn-outline btn-small" onclick='openDetailPendonorModal(<?= htmlspecialchars(json_encode($pendonor), ENT_QUOTES, "UTF-8") ?>)'>
Detail
                                        </button>
                                        <button type="button" class="btn btn-danger btn-small" onclick="hapusPendonor(<?= $pendonor['id'] ?>)">
Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; else: ?>
                            <tr><td colspan="7" style="text-align: center;">Belum ada data pendonor.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <div class="modal" id="pendonorModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Tambah Pendonor</h2>
                <button class="modal-close" id="closeModal"></button>
            </div>

            <form id="pendonorForm" action="index.php?page=petugas-tambah-pendonor" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="namaPendonor" class="required">Nama Lengkap</label>
                            <input type="text" id="namaPendonor" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="noIdentitas" class="required">No. Identitas (KTP/NIK)</label>
                            <input type="text" id="noIdentitas" name="no_identitas" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="golDarah" class="required">Golongan Darah</label>
                            <select id="golDarah" name="golongan_darah" required>
                                <option value="">-- Pilih Golongan Darah --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rhesus" class="required">Rhesus</label>
                            <select id="rhesus" name="rhesus" required>
                                <option value="">-- Pilih Rhesus --</option>
                                <option value="+">Positif (+)</option>
                                <option value="-">Negatif (-)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nomorTelepon" class="required">No. Telepon</label>
                            <input type="tel" id="nomorTelepon" name="telepon" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="tanggalLahir" class="required">Tanggal Lahir</label>
                            <input type="date" id="tanggalLahir" name="tanggal_lahir" required>
                        </div>

                        <div class="form-group">
                            <label for="jenisKelamin" class="required">Jenis Kelamin</label>
                            <select id="jenisKelamin" name="jenis_kelamin" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="required">Alamat</label>
                        <textarea id="alamat" name="alamat" required></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="kota">Kota</label>
                            <input type="text" id="kota" name="kota">
                        </div>

                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" id="provinsi" name="provinsi">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" id="pekerjaan" name="pekerjaan">
                        </div>

                        <div class="form-group">
                            <label for="tekananDarah">Tekanan Darah (Misal: 120/80)</label>
                            <input type="text" id="tekananDarah" name="tekanan_darah" value="120/80">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="statusDonasi">Status Donasi Awal</label>
                        <select id="statusDonasi" name="status_donasi" required>
                            <option value="Berhasil">Berhasil (Stok akan bertambah)</option>
                            <option value="Ditolak">Ditolak (Stok tidak bertambah)</option>
                        </select>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" id="statusAktif" name="status" value="aktif" checked>
                        <label for="statusAktif">Pendonor Aktif</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" id="cancelBtn"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-primary-sidora"><i data-lucide="save"></i> <span>Simpan</span></button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="modal" id="detailPendonorModal">
        <div class="modal-content" style="max-width:550px;">
            <div class="modal-header">
                <h2>Detail Pendonor</h2>
                <button type="button" class="modal-close" onclick="closeModal('detailPendonorModal')">&times;</button>
            </div>
            <div class="modal-body" id="detailPendonorBody"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-gray" onclick="closeModal('detailPendonorModal')"><i data-lucide="x"></i> <span>Tutup</span></button>
            </div>
        </div>
    </div>

    
    <form id="hapusPendonorForm" method="POST" action="index.php?page=petugas-hapus-pendonor" style="display:none;">
        <input type="hidden" name="id" id="hapusPendonorId">
    </form>

    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/modals.js"></script>
    <script src="assets/js/table-actions.js"></script>
    <script>
        
        const modal = document.getElementById('pendonorModal');
        const btn = document.getElementById('tambahPendonorBtn');
        const span = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');

        if(btn)       btn.onclick       = () => openModal('pendonorModal');
        if(span)      span.onclick      = () => closeModal('pendonorModal');
        if(cancelBtn) cancelBtn.onclick = () => closeModal('pendonorModal');

        
        function hapusPendonor(id) {
            if (confirm('Hapus pendonor ini? Data riwayat donasi terkait mungkin juga terpengaruh.')) {
                document.getElementById('hapusPendonorId').value = id;
                document.getElementById('hapusPendonorForm').submit();
            }
        }

        function openDetailPendonorModal(data) {
            const html = `
                <div style="display: grid; grid-template-columns: 150px 1fr; gap: 10px; margin-bottom: 10px;">
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
                </div>
            `;
            document.getElementById('detailPendonorBody').innerHTML = html;
            document.getElementById('detailPendonorModal').classList.add('active');
        }
    </script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
