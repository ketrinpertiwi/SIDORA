<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - SIDORA Rumah Sakit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard.css">
    <style>
        .profile-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .profile-header {
            background: white;
            border-radius: var(--border-radius);
            padding: var(--spacing-xl);
            margin-bottom: var(--spacing-lg);
            box-shadow: var(--shadow);
            text-align: center;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 2rem;
            margin: 0 auto var(--spacing-lg);
        }

        .profile-header h1 {
            margin: 0 0 var(--spacing-sm) 0;
            font-size: 1.8rem;
        }

        .profile-header p {
            margin: 0;
            color: var(--gray);
        }

        .profile-section {
            background: white;
            border-radius: var(--border-radius);
            padding: var(--spacing-lg);
            margin-bottom: var(--spacing-lg);
            box-shadow: var(--shadow);
        }

        .profile-section h2 {
            margin-top: 0;
            margin-bottom: var(--spacing-lg);
            color: var(--dark-gray);
            border-bottom: 2px solid var(--light-gray);
            padding-bottom: var(--spacing-md);
        }

        .profile-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--spacing-lg);
            margin-bottom: var(--spacing-lg);
        }

        .profile-row:last-child {
            margin-bottom: 0;
        }

        .profile-field {
            padding: var(--spacing-md);
            background: var(--light-gray);
            border-radius: var(--border-radius);
        }

        .profile-field label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--gray);
            margin-bottom: var(--spacing-xs);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-field p {
            margin: 0;
            color: var(--dark-gray);
            font-size: 1rem;
            font-weight: 500;
        }

        .profile-actions {
            display: flex;
            gap: var(--spacing-md);
            margin-top: var(--spacing-lg);
        }

        .profile-actions .btn {
            flex: 1;
        }

        @media (max-width: 768px) {
            .profile-row {
                grid-template-columns: 1fr;
            }

            .profile-actions {
                flex-direction: column;
            }

            .profile-header {
                padding: var(--spacing-lg);
            }
        }
    </style>
    </head>
<body>
    <div class="dashboard-layout">
        <nav class="navbar">
            <div class="navbar-left">
                <button class="navbar-toggle" id="sidebarToggle"><i data-lucide="menu"></i></button>
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
                    <a href="index.php?page=rs-history-permintaan" class="sidebar-menu-link">
                        
                        
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
                    <a href="index.php?page=rs-profil" class="sidebar-menu-link active">
                        
                        
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
                    <span>Profil</span>
                </div>

                <div class="page-title">
                    <h1>Profil Rumah Sakit</h1>
                </div>
            </div>

            <div class="profile-container">
                <div class="profile-header">
                    <div class="profile-avatar">RS</div>
                    <h1><?= htmlspecialchars($user['nama'] ?? 'RSUD Bandar Lampung') ?></h1>
                    <p>Rumah Sakit Umum Daerah</p>
                </div>

                <div class="profile-section">
                    <h2>Informasi Dasar</h2>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>Nama Rumah Sakit</label>
                            <p><?= htmlspecialchars($user['nama'] ?? 'RSUD Bandar Lampung') ?></p>
                        </div>
                        <div class="profile-field">
                            <label>Tipe Rumah Sakit</label>
                            <p>Rumah Sakit Umum Daerah (RSUD)</p>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>No. Izin Operasional</label>
                            <p>123/IZN/RSUD/2022</p>
                        </div>
                        <div class="profile-field">
                            <label>Status</label>
                            <p><span style="background: #dcfce7; padding: 0.25rem 0.75rem; border-radius: 999px; color: #166534; font-weight: 600;">Aktif</span></p>
                        </div>
                    </div>
                </div>

                <div class="profile-section">
                    <h2>Informasi Kontak</h2>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>Alamat Lengkap</label>
                            <p>Jl. Dr. Rivai No. 1, Bandar Lampung 35145</p>
                        </div>
                        <div class="profile-field">
                            <label>Kelurahan / Desa</label>
                            <p>Labuhan Ratu</p>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>Kecamatan</label>
                            <p>Bandar Lampung</p>
                        </div>
                        <div class="profile-field">
                            <label>Kota / Kabupaten</label>
                            <p>Bandar Lampung</p>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>Provinsi</label>
                            <p>Lampung</p>
                        </div>
                        <div class="profile-field">
                            <label>Kode Pos</label>
                            <p>35145</p>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>Telepon</label>
                            <p>0721-701-001</p>
                        </div>
                        <div class="profile-field">
                            <label>Email</label>
                            <p>info@rsudbl.ac.id</p>
                        </div>
                    </div>
                </div>

                <div class="profile-section">
                    <h2>Informasi Akun</h2>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>Username</label>
                            <p><?= htmlspecialchars($user['username'] ?? 'rsudbl_2024') ?></p>
                        </div>
                        <div class="profile-field">
                            <label>Email Akun</label>
                            <p><?= htmlspecialchars($user['email'] ?? 'admin@rsudbl.ac.id') ?></p>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>Nama Kontak</label>
                            <p>Drs. H. Bambang Sutrisno</p>
                        </div>
                        <div class="profile-field">
                            <label>Jabatan Kontak</label>
                            <p>Direktur Utama</p>
                        </div>
                    </div>
                    <div class="profile-row">
                        <div class="profile-field">
                            <label>Telepon Kontak</label>
                            <p>0812-3456-7890</p>
                        </div>
                        <div class="profile-field">
                            <label>Tanggal Pendaftaran</label>
                            <p>15 Januari 2022</p>
                        </div>
                    </div>
                </div>

            <div class="profile-section" style="border: none; box-shadow: none; padding: 0; margin-bottom: var(--spacing-lg);">
                    <div class="profile-actions">
                        <button class="btn btn-outline-sidora" onclick="document.getElementById('editProfilModal').classList.add('active')"><i data-lucide="pencil"></i> <span>Edit Profil</span></button>
                        <button class="btn btn-outline-sidora" onclick="document.getElementById('ubahPasswordModal').classList.add('active')"><i data-lucide="key"></i> <span>Ubah Password</span></button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    
    <div class="modal" id="editProfilModal">
        <div class="modal-content" style="max-width: 600px;">
            <div class="modal-header">
                <h2>Edit Profil Rumah Sakit</h2>
                <button class="modal-close" onclick="document.getElementById('editProfilModal').classList.remove('active')">&times;</button>
            </div>
            <form action="index.php?page=rs-profil-update" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Rumah Sakit</label>
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($user['nama'] ?? '') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username'] ?? '') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="3"><?= htmlspecialchars($user['alamat'] ?? '') ?></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="<?= htmlspecialchars($user['telepon'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Kontak / PIC</label>
                            <input type="text" name="kontak" class="form-control" value="<?= htmlspecialchars($user['kontak'] ?? '') ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" onclick="document.getElementById('editProfilModal').classList.remove('active')"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-primary-sidora">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="modal" id="ubahPasswordModal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">
                <h2>Ubah Password</h2>
                <button class="modal-close" onclick="document.getElementById('ubahPasswordModal').classList.remove('active')">&times;</button>
            </div>
            <form action="index.php?page=rs-ubah-password" method="POST" id="ubahPasswordForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" name="old_password" id="old_password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" minlength="8" required>
                        <small id="password-error" style="color: red; display: none; margin-top: 5px;">Konfirmasi password tidak cocok!</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-gray" onclick="document.getElementById('ubahPasswordModal').classList.remove('active')"><i data-lucide="x"></i> <span>Batal</span></button>
                    <button type="submit" class="btn btn-primary-sidora">Simpan Password</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('ubahPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newPass = document.getElementById('new_password').value;
            const confPass = document.getElementById('confirm_password').value;
            
            if (newPass !== confPass) {
                document.getElementById('password-error').style.display = 'block';
                return;
            }
            
            document.getElementById('password-error').style.display = 'none';
            alert('Password berhasil diubah!');
            this.submit();
        });
    </script>
    <script src="assets/js/sidebar.js"></script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
