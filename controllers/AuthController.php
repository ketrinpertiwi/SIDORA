<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function showLogin()
    {
        require 'views/auth/login.php';
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && (password_verify($password, $user['password']) || $password === $user['password'])) {
            if ($user['role'] === 'rumahsakit' && $user['status'] !== 'aktif') {
                $_SESSION['error'] = 'Akun rumah sakit belum aktif. Tunggu verifikasi admin.';
                header('Location: index.php?page=login');
                exit;
            }
            if ($user['status'] === 'nonaktif' || $user['status'] === 'ditolak') {
                $_SESSION['error'] = 'Akun Anda tidak aktif. Hubungi administrator.';
                header('Location: index.php?page=login');
                exit;
            }

            $_SESSION['user'] = $user;

            if ($user['role'] === 'admin') {
                header('Location: index.php?page=admin-dashboard');
            } elseif ($user['role'] === 'petugas') {
                header('Location: index.php?page=petugas-dashboard');
            } else {
                header('Location: index.php?page=rs-dashboard');
            }
            exit;
        }

        $_SESSION['error'] = 'Email atau password salah.';
        header('Location: index.php?page=login');
    }

    public function registerRs()
    {
        $namaRs = trim($_POST['nama_rs'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$namaRs || !$email || !$password) {
            $_SESSION['error'] = 'Semua data harus diisi.';
            header('Location: index.php?page=register-rs');
            exit;
        }

        $userModel = new User();
        $existingUser = $userModel->findByEmail($email);

        if ($existingUser) {
            $_SESSION['error'] = 'Email sudah terdaftar.';
            header('Location: index.php?page=register-rs');
            exit;
        }

        $created = $userModel->create([
            'name' => $namaRs,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'rumahsakit',
            'status' => 'pending',
        ]);

        if ($created) {
            $_SESSION['success'] = 'Registrasi berhasil. Tunggu aktivasi admin.';
            header('Location: index.php?page=login');
            exit;
        }

        $_SESSION['error'] = 'Terjadi kesalahan saat registrasi.';
        header('Location: index.php?page=register-rs');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }
}
