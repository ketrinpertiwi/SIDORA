<?php
require_once __DIR__ . '/../config/database.php';

class User
{
    public function findByEmail($email)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPetugas()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users WHERE role = 'petugas' ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPendingRumahSakit()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users WHERE role = 'rumahsakit' ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET status = :status WHERE id = :id");
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }

    public function create($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, status) VALUES (:name, :email, :password, :role, :status)");
        return $stmt->execute($data);
    }

    public function createPetugas($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, status, telepon, username) VALUES (:name, :email, :password, :role, :status, :telepon, :username)");
        return $stmt->execute($data);
    }

    public function createRumahSakitPending($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role, status, alamat, telepon) VALUES (:name, :email, :password, :role, :status, :alamat, :telepon)");
        return $stmt->execute($data);
    }

    public function updatePetugas($id, $data)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, telepon = :telepon, status = :status WHERE id = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function deletePetugas($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id AND role = 'petugas'");
        return $stmt->execute(['id' => $id]);
    }

    public function updateProfil($id, $data)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET name = :name, username = :username, alamat = :alamat, telepon = :telepon, kontak = :kontak WHERE id = :id");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function updatePassword($id, $hashedPassword)
    {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
        return $stmt->execute(['password' => $hashedPassword, 'id' => $id]);
    }

    public function approveRumahSakit($id)
    {
        return $this->updateStatus($id, 'aktif');
    }

    public function rejectRumahSakit($id)
    {
        return $this->updateStatus($id, 'ditolak');
    }
}
