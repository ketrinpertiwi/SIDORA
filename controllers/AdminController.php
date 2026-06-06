<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Pendonor.php';
require_once __DIR__ . '/../models/JadwalDonor.php';
require_once __DIR__ . '/../models/StokDarah.php';
require_once __DIR__ . '/../models/RiwayatDonasi.php';
require_once __DIR__ . '/../models/PermintaanDarah.php';

class AdminController
{
    private $userModel;
    private $pendonorModel;
    private $jadwalModel;
    private $stokModel;
    private $permintaanModel;
    private $riwayatModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->pendonorModel = new Pendonor();
        $this->jadwalModel = new JadwalDonor();
        $this->stokModel = new StokDarah();
        $this->permintaanModel = new PermintaanDarah();
        $this->riwayatModel = new RiwayatDonasi();
    }

    private function requireAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: index.php?page=login');
            exit;
        }
    }

    
    public function dashboard()
    {
        $this->requireAdmin();
        $stokList = $this->stokModel->getAll();
        $stokTotal = array_reduce($stokList, function($carry, $item) {
            return $carry + (int)$item['jumlah'];
        }, 0);

        $permintaanAll = $this->permintaanModel->getAll();
        $permintaanPending = count(array_filter($permintaanAll, function($p) {
            return $p['status'] === 'Pending';
        }));

        $users = $this->userModel->getAll();
        $petugasCount = count(array_filter($users, function($u) { return $u['role'] === 'petugas'; }));
        $rsCount = count(array_filter($users, function($u) { return $u['role'] === 'rumahsakit'; }));

        $statistics = [
            'pendonor'   => count($this->pendonorModel->getAll()),
            'stok_total' => $stokTotal,
            'permintaan' => $permintaanPending,
            'jadwal'     => count($this->jadwalModel->getAll()),
            'petugas'    => $petugasCount,
            'rumahsakit' => $rsCount,
        ];

        $permintaan  = $this->permintaanModel->getAllWithUser();
        $stokDarah   = $stokList;

        require __DIR__ . '/../views/admin/dashboard.php';
    }

    
    public function stokDarah()
    {
        $this->requireAdmin();
        $stokList = $this->stokModel->getAll();
        require __DIR__ . '/../views/admin/stok-darah.php';
    }

    public function alertStok()
    {
        $this->requireAdmin();
        $_SESSION['success'] = 'Notifikasi alert stok kritis berhasil dicatat.';
        header('Location: index.php?page=admin-stok-darah');
        exit;
    }

    public function pesanStok()
    {
        $this->requireAdmin();
        $golongan = trim($_POST['golongan'] ?? '');
        $jumlah   = intval($_POST['jumlah'] ?? 0);
        if (!$golongan || $jumlah <= 0) {
            $_SESSION['error'] = 'Golongan darah dan jumlah wajib diisi.';
            header('Location: index.php?page=admin-stok-darah');
            exit;
        }
        $_SESSION['success'] = "Permintaan tambahan stok golongan $golongan sebanyak $jumlah kantong berhasil dicatat.";
        header('Location: index.php?page=admin-stok-darah');
        exit;
    }

    
    public function permintaanDarah()
    {
        $this->requireAdmin();
        $permintaan = $this->permintaanModel->getAllWithUser();
        require __DIR__ . '/../views/admin/permintaan-darah.php';
    }

    public function terimaPermintaan()
    {
        $this->requireAdmin();
        $id = intval($_GET['id'] ?? 0);
        if ($id) {
            $this->permintaanModel->approve($id);
            $_SESSION['success'] = 'Permintaan berhasil disetujui.';
        } else {
            $_SESSION['error'] = 'ID permintaan tidak valid.';
        }
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php?page=admin-permintaan-darah'));
        exit;
    }

    public function tolakPermintaan()
    {
        $this->requireAdmin();
        $id    = intval($_POST['permintaan_id'] ?? 0);
        $alasan = trim($_POST['alasan'] ?? '');
        if ($id && $alasan) {
            $this->permintaanModel->reject($id, $alasan);
            $_SESSION['success'] = 'Permintaan berhasil ditolak.';
        } else {
            $_SESSION['error'] = 'Alasan penolakan wajib diisi.';
        }
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php?page=admin-permintaan-darah'));
        exit;
    }

    public function kirimPermintaan()
    {
        $this->requireAdmin();
        $id    = intval($_POST['permintaan_id'] ?? 0);
        $kurir = trim($_POST['kurir'] ?? '');

        if ($id && $kurir) {
            
            $details = $this->permintaanModel->getDetails($id);
            $stokCukup = true;
            foreach ($details as $det) {
                if (!$this->stokModel->isStockAvailable($det['golongan'], $det['rhesus'], $det['jumlah'])) {
                    $stokCukup = false;
                    break;
                }
            }

            if (!$stokCukup) {
                $_SESSION['error'] = 'Stok darah tidak mencukupi untuk permintaan ini.';
                header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php?page=admin-permintaan-darah'));
                exit;
            }

            $this->permintaanModel->markAsSent($id, $kurir);
            foreach ($details as $det) {
                $this->stokModel->reduceStock($det['golongan'], $det['rhesus'], $det['jumlah']);
            }
            $_SESSION['success'] = 'Permintaan berhasil dikirim via kurir ' . htmlspecialchars($kurir) . '. Stok darah telah dikurangi.';
        } else {
            $_SESSION['error'] = 'Nama kurir wajib diisi.';
        }

        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php?page=admin-permintaan-darah'));
        exit;
    }

    
    public function permintaanKirim()   { return $this->kirimPermintaan(); }
    public function prosesPermintaan()  { return $this->tolakPermintaan(); }
    public function permintaanProcess() { return $this->tolakPermintaan(); }

    
    public function kelolaPetugas()
    {
        $this->requireAdmin();
        $users = $this->userModel->getAll();
        require __DIR__ . '/../views/admin/kelola-petugas.php';
    }

    public function tambahPetugasProcess()
    {
        $this->requireAdmin();
        $nama     = trim($_POST['nama'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $telepon  = trim($_POST['telepon'] ?? '');
        $status   = $_POST['status'] ?? 'aktif';
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (!$nama || !$email || !$password) {
            $_SESSION['error'] = 'Nama, email, dan password wajib diisi.';
            header('Location: index.php?page=admin-kelola-petugas');
            exit;
        }

        $existingUser = $this->userModel->findByEmail($email);
        if ($existingUser) {
            $_SESSION['error'] = 'Email sudah terdaftar.';
            header('Location: index.php?page=admin-kelola-petugas');
            exit;
        }

        $this->userModel->createPetugas([
            'name'     => $nama,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => 'petugas',
            'status'   => $status,
            'telepon'  => $telepon,
            'username' => $username,
        ]);

        $_SESSION['success'] = 'Petugas berhasil ditambahkan.';
        header('Location: index.php?page=admin-kelola-petugas');
        exit;
    }

    public function editPetugasProcess()
    {
        $this->requireAdmin();
        $id      = intval($_POST['id'] ?? 0);
        $nama    = trim($_POST['nama'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $telepon = trim($_POST['telepon'] ?? '');
        $status  = $_POST['status'] ?? 'aktif';

        if (!$id || !$nama || !$email) {
            $_SESSION['error'] = 'Data tidak lengkap.';
            header('Location: index.php?page=admin-kelola-petugas');
            exit;
        }

        $this->userModel->updatePetugas($id, [
            'name'    => $nama,
            'email'   => $email,
            'telepon' => $telepon,
            'status'  => $status,
        ]);

        $_SESSION['success'] = 'Data petugas berhasil diperbarui.';
        header('Location: index.php?page=admin-kelola-petugas');
        exit;
    }

    public function hapusPetugasProcess()
    {
        $this->requireAdmin();
        $id = intval($_POST['id'] ?? $_GET['id'] ?? 0);
        if ($id) {
            $this->userModel->deletePetugas($id);
            $_SESSION['success'] = 'Petugas berhasil dihapus.';
        } else {
            $_SESSION['error'] = 'ID tidak valid.';
        }
        header('Location: index.php?page=admin-kelola-petugas');
        exit;
    }

    
    public function approveRs()
    {
        $this->requireAdmin();
        $id     = intval($_POST['id'] ?? 0);
        $status = $_POST['status'] ?? null;

        if ($id && in_array($status, ['aktif', 'ditolak', 'nonaktif', 'pending'])) {
            $this->userModel->updateStatus($id, $status);
            $_SESSION['success'] = 'Status rumah sakit berhasil diperbarui.';
        } else {
            $_SESSION['error'] = 'Data tidak valid.';
        }

        header('Location: index.php?page=admin-kelola-petugas');
        exit;
    }

    
    public function jadwalDonor()
    {
        $this->requireAdmin();
        $jadwalList = $this->jadwalModel->getAll();
        require __DIR__ . '/../views/admin/jadwal-donor.php';
    }

    public function formJadwal()
    {
        $this->requireAdmin();
        require __DIR__ . '/../views/admin/form-jadwal.php';
    }

    public function formJadwalProcess()
    {
        $this->requireAdmin();
        $lokasi  = trim($_POST['lokasi'] ?? '');
        $tanggal = $_POST['tanggal'] ?? '';
        $target  = intval($_POST['target'] ?? 0);

        if (!$lokasi || !$tanggal || $target <= 0) {
            $_SESSION['error'] = 'Semua field jadwal harus diisi dengan benar.';
            header('Location: index.php?page=admin-form-jadwal');
            exit;
        }

        $this->jadwalModel->create(['lokasi' => $lokasi, 'tanggal' => $tanggal, 'target' => $target]);
        $_SESSION['success'] = 'Jadwal donor berhasil ditambahkan.';
        header('Location: index.php?page=admin-jadwal-donor');
        exit;
    }

    public function editJadwalProcess()
    {
        $this->requireAdmin();
        $id      = intval($_POST['id'] ?? 0);
        $lokasi  = trim($_POST['lokasi'] ?? '');
        $tanggal = $_POST['tanggal'] ?? '';
        $target  = intval($_POST['target'] ?? 0);

        if (!$id || !$lokasi || !$tanggal || $target <= 0) {
            $_SESSION['error'] = 'Semua field jadwal harus diisi.';
            header('Location: index.php?page=admin-jadwal-donor');
            exit;
        }

        $this->jadwalModel->update($id, ['lokasi' => $lokasi, 'tanggal' => $tanggal, 'target' => $target]);
        $_SESSION['success'] = 'Jadwal berhasil diperbarui.';
        header('Location: index.php?page=admin-jadwal-donor');
        exit;
    }

    public function hapusJadwalProcess()
    {
        $this->requireAdmin();
        $id = intval($_POST['id'] ?? $_GET['id'] ?? 0);
        if ($id) {
            $this->jadwalModel->delete($id);
            $_SESSION['success'] = 'Jadwal berhasil dihapus.';
        } else {
            $_SESSION['error'] = 'ID tidak valid.';
        }
        header('Location: index.php?page=admin-jadwal-donor');
        exit;
    }

    
    public function daftarPendonor()
    {
        $this->requireAdmin();
        $pendonorList = $this->pendonorModel->getAll();
        $search   = $_GET['search'] ?? '';
        $golongan = $_GET['golongan'] ?? '';
        $status   = $_GET['status'] ?? '';

        if ($search || $golongan || $status) {
            $pendonorList = array_filter($pendonorList, function($item) use ($search, $golongan, $status) {
                if ($golongan && ($item['golongan'] ?? '') != $golongan) return false;
                if ($status && ($item['status'] ?? 'aktif') != $status) return false;
                if ($search) {
                    $s = strtolower($search);
                    if (
                        strpos(strtolower($item['nama'] ?? ''), $s) === false &&
                        strpos(strtolower($item['nik'] ?? ''), $s) === false &&
                        strpos(strtolower($item['telepon'] ?? ''), $s) === false
                    ) return false;
                }
                return true;
            });
        }

        require __DIR__ . '/../views/admin/daftar-pendonor-admin.php';
    }

    
    public function exportSemuaLaporan()
    {
        $this->requireAdmin();
        $petugas    = $this->userModel->getAll();
        $pendonor   = $this->pendonorModel->getAll();
        $permintaan = $this->permintaanModel->getAllWithUser();

        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=Laporan_SIDORA_" . date('Y-m-d') . ".csv");
        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF).chr(0xBB).chr(0xBF)); 

        fputcsv($out, ['=== DATA PENGGUNA ===']);
        fputcsv($out, ['Nama', 'Email', 'Role', 'Status']);
        foreach ($petugas as $p) {
            fputcsv($out, [$p['name'], $p['email'], $p['role'], $p['status']]);
        }
        fputcsv($out, []);
        fputcsv($out, ['=== DATA PENDONOR ===']);
        fputcsv($out, ['Nama', 'Golongan Darah', 'NIK', 'Telepon', 'Status']);
        foreach ($pendonor as $pd) {
            fputcsv($out, [$pd['nama'], ($pd['golongan'] ?? '') . ($pd['rhesus'] ?? ''), $pd['nik'] ?? '', $pd['telepon'] ?? '', $pd['status'] ?? '']);
        }
        fputcsv($out, []);
        fputcsv($out, ['=== DATA PERMINTAAN ===']);
        fputcsv($out, ['Rumah Sakit', 'Golongan', 'Jumlah', 'Status', 'Tanggal Kirim', 'Kurir']);
        foreach ($permintaan as $req) {
            fputcsv($out, [
                $req['rumah_sakit'] ?? '',
                ($req['golongan'] ?? '') . ($req['rhesus'] ?? ''),
                $req['detail_jumlah'] ?? 0,
                $req['status'] ?? '',
                $req['tanggal_kirim'] ?? '',
                $req['kurir'] ?? '',
            ]);
        }
        fclose($out);
        exit;
    }

    public function exportPermintaanLaporan()
    {
        $this->requireAdmin();
        $permintaan = $this->permintaanModel->getAllWithUser();

        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=Permintaan_Darah_" . date('Y-m-d') . ".csv");
        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF).chr(0xBB).chr(0xBF));

        fputcsv($out, ['No', 'Rumah Sakit', 'Golongan', 'Jumlah', 'Prioritas', 'Status', 'Tanggal', 'Kurir']);
        $no = 1;
        foreach ($permintaan as $req) {
            fputcsv($out, [
                $no++,
                $req['rumah_sakit'] ?? '',
                ($req['golongan'] ?? '') . ($req['rhesus'] ?? ''),
                $req['detail_jumlah'] ?? 0,
                $req['prioritas'] ?? '',
                $req['status'] ?? '',
                $req['created_at'] ?? '',
                $req['kurir'] ?? '',
            ]);
        }
        fclose($out);
        exit;
    }
}
