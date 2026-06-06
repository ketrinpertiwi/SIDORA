<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Petugas - SIDORA Admin</title>
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
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: var(--border-radius);
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
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
        }

        .modal-footer {
            padding: var(--spacing-lg);
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-end;
            gap: var(--spacing-md);
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
                <div class="navbar-user" id="userMenuToggle">
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
                    <a href="index.php?page=admin-kelola-petugas" class="sidebar-menu-link active">
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
                    <span>Kelola Petugas</span>
                </div>

                <div class="page-title">
                    <h1>Kelola Petugas</h1>
                    <button class="btn btn-primary-sidora" id="tambahPetugasBtn">
                        <i data-lucide="plus"></i> Tambah Petugas
                    </button>
                </div>
            </div>

            <?php if (!empty($_SESSION['success'])): ?><div class="alert alert-success" style="background:#d1fae5;color:#065f46;padding:0.8rem 1rem;border-radius:8px;margin-bottom:1rem;"><?= htmlspecialchars($_SESSION['success']) ?></div><?php unset($_SESSION['success']); endif; ?>
            <?php if (!empty($_SESSION['error'])): ?><div class="alert alert-error" style="background:#fee2e2;color:#991b1b;padding:0.8rem 1rem;border-radius:8px;margin-bottom:1rem;"><?= htmlspecialchars($_SESSION['error']) ?></div><?php unset($_SESSION['error']); endif; ?>
            <form id="filterFormPetugas" class="filter-section">
                <div class="filter-group" style="flex: 2; min-width: 200px;">
                    <label for="searchPetugas">Cari Petugas</label>
                    <input type="text" id="searchPetugas" placeholder="Nama atau email...">
                </div>

                <div class="filter-group">
                    <label for="filterStatus">Status</label>
                    <select id="filterStatus">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-aktif</option>
                    </select>
                </div>

                <button type="button" class="btn btn-outline-gray" onclick="resetFilter('filterFormPetugas','tabelPetugas')"><i data-lucide="rotate-ccw"></i> <span>Reset</span></button>
            </form>

            <div class="table-container">
                <div class="table-header">
                    <h3>Daftar Petugas</h3>
                    <div class="table-actions">
                        <button type="button" class="btn btn-outline btn-small" onclick="exportTableToCSV('tabelPetugas','Petugas_SIDORA.csv')"><i data-lucide="file-output"></i> Export CSV</button>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table id="tabelPetugas">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Telepon</th>
                                <th>Status</th>
                                <th>Tanggal Bergabung</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): $no = 1; foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($user['name']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td><?= htmlspecialchars($user['telepon'] ?? '-') ?></td>
                                    <td><span class="badge <?= ($user['status'] ?? '') === 'aktif' ? 'badge-success' : 'badge-warning' ?>"><?php if (($user['status'] ?? '') === 'aktif'): ?><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><polyline points="20 6 9 17 4 12"/></svg> Aktif<?php else: ?><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg> Non-aktif<?php endif; ?></span></td>
                                    <td><?= htmlspecialchars($user['created_at'] ?? '-') ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="btn btn-outline-sidora btn-small" onclick='openEditPetugasModal(<?= htmlspecialchars(json_encode($user), ENT_QUOTES, "UTF-8") ?>)'>
                                                <i data-lucide="pen"></i> Edit
                                            </button>
                                            <button type="button" class="btn btn-danger btn-small" onclick="openHapusModal('hapusPetugasModal', <?= $user['id'] ?>)">
                                                <i data-lucide="trash-2"></i> Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr><td colspan="7" style="text-align: center;">Belum ada petugas terdaftar.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <div class="modal" id="petugasModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle">Tambah Petugas</h2>
                <button class="modal-close" id="closeModal"></button>
            </div>

            
            <form id="petugasForm" action="index.php?page=admin-tambah-petugas" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="namaPetugas" class="required">Nama Lengkap</label>
                            <input type="text" id="namaPetugas" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="emailPetugas" class="required">Email</label>
                            <input type="email" id="emailPetugas" name="email" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nomorPetugas" class="required">No. Telepon</label>
                            <input type="tel" id="nomorPetugas" name="telepon" required>
                        </div>

                        <div class="form-group">
                            <label for="statusPetugas" class="required">Status</label>
                            <select id="statusPetugas" name="status" required>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Non-aktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usernamePetugas" class="required">Username</label>
                        <input type="text" id="usernamePetugas" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="passwordPetugas" class="required">Password</label>
                        <input type="password" id="passwordPetugas" name="password" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" id="cancelBtn"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-primary-sidora"><i data-lucide="save"></i> <span>Simpan</span></button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="modal" id="editPetugasModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Petugas</h2>
                <button type="button" class="modal-close" onclick="closeModal('editPetugasModal')">&times;</button>
            </div>
            <form method="POST" action="index.php?page=admin-edit-petugas">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editId">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" id="editNama" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="editEmail" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="tel" name="telepon" id="editTelepon">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="editUsername" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="editPassword" placeholder="Kosongkan jika tidak diubah">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="editStatus">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Non-aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" onclick="closeModal('editPetugasModal')"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-primary-sidora">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="modal" id="hapusPetugasModal">
        <div class="modal-content" style="max-width:400px;">
            <div class="modal-header">
                <h2>Hapus Petugas</h2>
                <button type="button" class="modal-close" onclick="closeModal('hapusPetugasModal')">&times;</button>
            </div>
            <form method="POST" action="index.php?page=admin-hapus-petugas">
                <div class="modal-body">
                    <input type="hidden" name="id" id="hapusPetugasId">
                    <p>Apakah Anda yakin ingin menghapus petugas ini? Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" onclick="closeModal('hapusPetugasModal')"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/sidebar.js"></script>
    <script src="assets/js/modals.js"></script>
    <script src="assets/js/table-actions.js"></script>
    <script>
        
        document.getElementById('tambahPetugasBtn').onclick = () => openModal('petugasModal');
        document.getElementById('closeModal').onclick = () => closeModal('petugasModal');
        document.getElementById('cancelBtn').onclick = () => closeModal('petugasModal');

        
        function openEditPetugasModal(data) {
            document.getElementById('editId').value    = data.id || '';
            document.getElementById('editNama').value  = data.name || '';
            document.getElementById('editEmail').value = data.email || '';
            document.getElementById('editTelepon').value = data.telepon || '';
            document.getElementById('editUsername').value = data.username || '';
            document.getElementById('editPassword').value = '';
            document.getElementById('editStatus').value  = data.status || 'aktif';
            openModal('editPetugasModal');
        }

        
        function openHapusModal(modalId, id) {
            document.getElementById('hapusPetugasId').value = id;
            openModal('hapusPetugasModal');
        }

        
        document.getElementById('searchPetugas').addEventListener('input', function() {
            const val = this.value.toLowerCase();
            document.querySelectorAll('#tabelPetugas tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
            });
        });
    </script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
