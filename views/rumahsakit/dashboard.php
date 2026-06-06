<?php if (!defined('IGNORE')) {  } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Rumah Sakit - SIDORA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/pages/dashboard.css">
    <style>


        .stat-icon.danger {
            background-color: rgba(220, 38, 38, 0.1);
            color: var(--danger-color);
        }

        .card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: var(--spacing-lg);
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .mb-3 {
            margin-bottom: var(--spacing-lg);
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
                    <a href="index.php?page=rs-dashboard" class="sidebar-menu-link active">
                        
                        
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
                    <span>Beranda</span>
                </div>

                <div class="page-title">
                    <h1>Selamat Datang, Rumah Sakit! </h1>
                </div>
            </div>

            <div class="dashboard-grid">
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Total Permintaan</h3>
                        <p class="stat-value">-</p>
                        <div class="stat-change positive">
Semua Waktu
                        </div>
                    </div>
                    <div class="stat-icon primary"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="15" y2="16"/><polyline points="9 8 10 9 12 7"/></svg></div>
                </div>

               
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Permintaan Ditinjau</h3>
                        <p class="stat-value">-</p>
                        <div class="stat-change negative">
Menunggu Persetujuan
                        </div>
                    </div>
                    <div class="stat-icon warning"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Disetujui</h3>
                        <p class="stat-value">-</p>
                        <div class="stat-change positive">
Berhasil
                        </div>
                    </div>
                    <div class="stat-icon success"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg></div>
                </div>

                <div class="stat-card">
                    <div class="stat-content">
                        <h3>Permintaan Ditolak</h3>
                        <p class="stat-value">-</p>
                        <div class="stat-change negative">
Tidak Tersedia
                        </div>
                    </div>
                    <div class="stat-icon danger"><svg width="24" height="24" style="display:inline-block;vertical-align:middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg></div>
                </div>
            </div>

            <div class="card mb-3" style="display: flex; gap: var(--spacing-md); padding: var(--spacing-lg);">
                <button class="btn btn-primary-sidora" onclick="window.location.href='index.php?page=rs-permintaan'">Ajukan Permintaan Darah
                </button>
                <button class="btn btn-outline" onclick="window.location.href='index.php?page=rs-history-permintaan'">Lihat Riwayat
                </button>
            </div>

            <div class="table-container">
                <div class="table-header">
                    <h3>Permintaan Darah Terbaru</h3>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Golongan Darah</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($permintaanList)): $no=1; $limit = array_slice($permintaanList, 0, 5); foreach ($limit as $item): ?>
                                <?php 
                                    $status = $item['status'] ?? 'Pending';
                                    $statusClass = 'badge-warning';
                                    if ($status == 'Disetujui' || $status == 'Dikirim') $statusClass = 'badge-success';
                                    elseif ($status == 'Ditolak') $statusClass = 'badge-danger';
                                    
                                    
                                    $details = json_encode([
                                        'keterangan' => $item['keterangan'] ?? '-',
                                        'prioritas' => $item['prioritas'] ?? '-',
                                        'alasan_tolak' => $item['alasan_tolak'] ?? '-',
                                        'tanggal_tolak' => $item['tanggal_tolak'] ?? '-',
                                        'kurir' => $item['kurir'] ?? '-',
                                        'tanggal_kirim' => $item['tanggal_kirim'] ?? '-'
                                    ]);
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars(date('d M Y', strtotime($item['created_at']))) ?></td>
                                    <td><strong><?= htmlspecialchars($item['golongan'] ?? '-') ?> <?= htmlspecialchars($item['rhesus'] ?? '') ?></strong></td>
                                    <td><?= htmlspecialchars($item['detail_jumlah'] ?? $item['jumlah'] ?? '0') ?> Kantong</td>
                                    <td><span class="badge <?= $statusClass ?>"><?= htmlspecialchars($status) ?></span></td>
                                    <td>
                                        <button class="btn btn-outline btn-small" onclick='openDetailPermintaanModal(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, "UTF-8") ?>)'>
Detail
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                            <tr><td colspan="6" style="text-align: center;">Belum ada permintaan darah terbaru.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card" style="background: linear-gradient(135deg, #dbeafe 0%, #cffafe 100%); border: none;">
                <h3 style="color: var(--primary-color); margin-top: 0;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;flex-shrink:0;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg> Informasi Penting</h3>
                <ul style="color: var(--dark-gray); margin: 0; padding-left: 1.5rem;">
                    <li>Permintaan darah akan diproses maksimal 24 jam setelah pengajuan</li>
                    <li>Stok darah dapat dilihat secara real-time untuk perencanaan yang lebih baik</li>
                    <li>Hubungi tim support jika ada pertanyaan atau kendala</li>
                </ul>
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
                <div class="detail-row"><span class="detail-label">Jumlah Kantong</span>${data.jumlah || 0} Kantong</div>
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

    <script src="assets/vendor/lucide/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>
</html>
