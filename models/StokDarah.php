<?php
require_once __DIR__ . '/../config/database.php';

class StokDarah
{
    public function getAll()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM stok_darah ORDER BY golongan_darah ASC, rhesus ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM stok_darah WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByGolonganRhesus($golongan, $rhesus)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM stok_darah WHERE golongan_darah = :golongan AND rhesus = :rhesus LIMIT 1");
        $stmt->execute(['golongan' => $golongan, 'rhesus' => $rhesus]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isStockAvailable($golongan, $rhesus, $jumlah)
    {
        $stok = $this->getByGolonganRhesus($golongan, $rhesus);
        return $stok && (int)$stok['jumlah'] >= (int)$jumlah;
    }

    public function addStock($golongan, $rhesus, $jumlah)
    {
        return $this->updateStockByGolongan($golongan, $rhesus, abs($jumlah));
    }

    public function reduceStock($golongan, $rhesus, $jumlah)
    {
        return $this->updateStockByGolongan($golongan, $rhesus, -abs($jumlah));
    }

    public function updateQuantity($id, $jumlah)
    {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE stok_darah SET jumlah = :jumlah WHERE id = :id');
        return $stmt->execute(['jumlah' => $jumlah, 'id' => $id]);
    }

    public function updateStockByGolongan($golongan, $rhesus, $jumlah_tambah)
    {
        global $pdo;
        
        $stmt = $pdo->prepare('UPDATE stok_darah SET jumlah = GREATEST(0, jumlah + :jumlah) WHERE golongan_darah = :golongan AND rhesus = :rhesus');
        $stmt->execute(['jumlah' => $jumlah_tambah, 'golongan' => $golongan, 'rhesus' => $rhesus]);
    }
}
