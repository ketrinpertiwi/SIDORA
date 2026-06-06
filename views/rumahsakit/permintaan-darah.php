<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Permintaan Darah - SIDORA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard.css">
    <style>
        .form-section {
            background: white;
            border-radius: var(--border-radius);
            padding: var(--spacing-lg);
            box-shadow: var(--shadow);
            max-width: 700px;
            margin: 0 auto;
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

        .blood-type-selector {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: var(--spacing-md);
            margin-bottom: var(--spacing-lg);
        }

        .blood-type-btn {
            padding: var(--spacing-md);
            border: 2px solid var(--border-color);
            background: white;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 600;
            font-size: 1rem;
        }

        .blood-type-btn:hover {
            border-color: var(--primary-color);
            background-color: 
        }

        .blood-type-btn.selected {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .quantity-input {
            display: flex;
            align-items: center;
            gap: var(--spacing-sm);
        }

        .quantity-btn {
            width: 36px;
            height: 36px;
            border: 1px solid var(--border-color);
            background: white;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background-color: var(--light-gray);
        }

        .quantity-input input {
            width: 60px;
            text-align: center;
        }

        .request-summary {
            background: var(--light-gray);
            border-radius: var(--border-radius);
            padding: var(--spacing-lg);
            margin-top: var(--spacing-lg);
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: var(--spacing-sm) 0;
            border-bottom: 1px solid var(--border-color);
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            padding: var(--spacing-md) 0;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--primary-color);
        }

        .alert-info {
            background: 
            border: 1px solid 
            color: 
            padding: var(--spacing-md);
            border-radius: var(--border-radius);
            margin-bottom: var(--spacing-lg);
        }

        .alert-warning {
            background: 
            border: 1px solid 
            color: 
            padding: var(--spacing-md);
            border-radius: var(--border-radius);
            margin-bottom: var(--spacing-lg);
        }

        .file-upload-box {
            border: 2px dashed var(--border-color);
            border-radius: var(--border-radius);
            padding: var(--spacing-lg);
            background: var(--light-gray);
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
        }

        .file-upload-box:hover {
            border-color: var(--primary-color);
            background: 
        }

        .file-upload-box input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .file-upload-icon {
            margin-bottom: var(--spacing-sm);
            color: var(--gray);
        }

        .file-upload-box p {
            margin: 0 0 4px 0;
            font-size: 0.95rem;
            color: var(--dark-gray);
            font-weight: 500;
        }

        .file-upload-box .file-name {
            font-size: 0.85rem;
            color: var(--primary-color);
            font-weight: 600;
            margin-top: 6px;
            display: none;
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
                    <a href="index.php?page=rs-permintaan" class="sidebar-menu-link active">
                        
                        
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
                    <span>Ajukan Permintaan Darah</span>
                </div>

                <div class="page-title">
                    <h1>Ajukan Permintaan Darah</h1>
                </div>
            </div>

            <div class="form-section">
                <?php if (isset($_SESSION['error'])): ?>
                <div class="alert-warning">
<?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
                </div>
                <?php endif; ?>

                <div class="alert-info">
Permintaan darah Anda akan diproses maksimal 24 jam. Silakan hubungi kami jika ada pertanyaan.
                </div>

                <form id="permintaanForm" action="index.php?page=rs-permintaan-store" method="POST">
                    <h3>Informasi Pasien</h3>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="namaPasien" class="required">Nama Pasien</label>
                            <input type="text" id="namaPasien" name="nama_pasien" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="noPasien" class="required">No. Pasien/Rekam Medis</label>
                            <input type="text" id="noPasien" name="no_pasien" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="ruangan" class="required">Ruangan/Dept.</label>
                            <input type="text" id="ruangan" name="ruangan" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="dokter" class="required">Dokter Penanggungjawab</label>
                            <input type="text" id="dokter" name="dokter" class="form-control" required>
                        </div>
                    </div>

                    <h3 style="margin-top: var(--spacing-2xl); margin-bottom: var(--spacing-lg);">Jenis Darah yang Dibutuhkan</h3>

                    <p style="font-size: 0.95rem; color: var(--gray); margin-bottom: var(--spacing-md);">Pilih golongan darah yang Anda butuhkan:</p>

                    <div class="blood-type-selector">
                        <button type="button" class="blood-type-btn" data-gol="O" data-rh="+" onclick="selectBloodType(this, 'O', '+')">O+</button>
                        <button type="button" class="blood-type-btn" data-gol="O" data-rh="-" onclick="selectBloodType(this, 'O', '-')">O-</button>
                        <button type="button" class="blood-type-btn" data-gol="A" data-rh="+" onclick="selectBloodType(this, 'A', '+')">A+</button>
                        <button type="button" class="blood-type-btn" data-gol="A" data-rh="-" onclick="selectBloodType(this, 'A', '-')">A-</button>
                        <button type="button" class="blood-type-btn" data-gol="B" data-rh="+" onclick="selectBloodType(this, 'B', '+')">B+</button>
                        <button type="button" class="blood-type-btn" data-gol="B" data-rh="-" onclick="selectBloodType(this, 'B', '-')">B-</button>
                        <button type="button" class="blood-type-btn" data-gol="AB" data-rh="+" onclick="selectBloodType(this, 'AB', '+')">AB+</button>
                        <button type="button" class="blood-type-btn" data-gol="AB" data-rh="-" onclick="selectBloodType(this, 'AB', '-')">AB-</button>
                    </div>

                    <input type="hidden" id="selectedGolongan" name="golongan" required>
                    <input type="hidden" id="selectedRhesus" name="rhesus" required>

                    <div class="form-group">
                        <label for="jumlah" class="required">Jumlah Kantong Darah</label>
                        <div class="quantity-input">
                            <button type="button" class="quantity-btn" onclick="decreaseQuantity()">-</button>
                            <input type="number" id="jumlah" name="jumlah" value="1" min="1" max="100" readonly class="form-control" style="width: 80px;">
                            <button type="button" class="quantity-btn" onclick="increaseQuantity()">+</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan/Catatan Khusus</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" rows="3" placeholder="Misalnya: untuk operasi darurat, kondisi pasien kritis, dll"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="prioritas" class="required">Prioritas</label>
                        <select id="prioritas" name="prioritas" class="form-control" required>
                            <option value="">-- Pilih Prioritas --</option>
                            <option value="biasa">Biasa (Standar)</option>
                            <option value="segera">Segera (Urgent)</option>
                            <option value="darurat">Darurat (Emergency)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Surat Permintaan Resmi (PDF/Image)</label>
                        <input type="file" name="surat_permintaan" id="suratInput" accept=".pdf,.jpg,.jpeg,.png" style="display:block; width:100%; padding:8px; border:1px solid var(--border-color); border-radius:var(--border-radius); background:white; font-family:inherit; font-size:0.9rem;">
                        <small class="text-muted" style="margin-top:4px; display:block;">Opsional, namun disarankan untuk meningkatkan proses verifikasi</small>
                    </div>

                    <div class="request-summary">
                        <h4 style="margin-top: 0; color: var(--dark-gray);"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg> Ringkasan Permintaan</h4>
                        <div class="summary-item">
                            <span>Golongan Darah:</span>
                            <strong id="summaryBlood">-</strong>
                        </div>
                        <div class="summary-item">
                            <span>Jumlah Kantong:</span>
                            <strong id="summaryQty">1 Kantong</strong>
                        </div>
                        <div class="summary-item">
                            <span>Prioritas:</span>
                            <strong id="summaryPriority">-</strong>
                        </div>
                    </div>

                    <div style="display: flex; gap: var(--spacing-md); margin-top: var(--spacing-2xl);">
                        <button type="reset" class="btn btn-outline" style="flex: 1;">Bersihkan Form</button>
                        <button type="submit" class="btn btn-primary-sidora" style="flex: 1;">Ajukan Permintaan
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    
    <script>
        function selectBloodType(btn, gol, rh) {
            document.querySelectorAll('.blood-type-btn').forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            document.getElementById('selectedGolongan').value = gol;
            document.getElementById('selectedRhesus').value = rh;
            document.getElementById('summaryBlood').textContent = gol + rh;
        }

        function decreaseQuantity() {
            const input = document.getElementById('jumlah');
            let val = parseInt(input.value);
            if (val > 1) {
                input.value = val - 1;
                updateSummaryQty(val - 1);
            }
        }

        function increaseQuantity() {
            const input = document.getElementById('jumlah');
            let val = parseInt(input.value);
            if (val < 100) {
                input.value = val + 1;
                updateSummaryQty(val + 1);
            }
        }

        function updateSummaryQty(qty) {
            document.getElementById('summaryQty').textContent = qty + " Kantong";
        }

        document.getElementById('prioritas').addEventListener('change', function() {
            document.getElementById('summaryPriority').textContent = this.options[this.selectedIndex].text;
        });

        document.getElementById('permintaanForm').addEventListener('reset', function() {
            setTimeout(() => {
                document.querySelectorAll('.blood-type-btn').forEach(b => b.classList.remove('selected'));
                document.getElementById('summaryBlood').textContent = '-';
                document.getElementById('summaryQty').textContent = '1 Kantong';
                document.getElementById('summaryPriority').textContent = '-';
            }, 10);
        });
    </script>
    <script src="assets/js/sidebar.js"></script>

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
