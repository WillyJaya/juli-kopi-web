<?php
include 'koneksi.php';
$db = new database();

// Ambil ID barang dari URL
$id_barang = $_GET['id_barang'] ?? null;

if (!$id_barang) {
    die("ID barang tidak ditemukan.");
}

// Ambil data barang berdasarkan ID
$barang = $db->get_by_id($id_barang); // Ganti ke get_by_id karena get_barang_by_id belum ada

if (!$barang) {
    die("Barang tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penyesuaian Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h3 class="mb-4">Penyesuaian Stok</h3>

    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Barang: <?= htmlspecialchars($barang['nama_barang']) ?></h5>
            
            <form method="post" action="proses_penyesuaian.php" autocomplete="off">
                <input type="hidden" name="id_barang" value="<?= (int)$barang['id_barang'] ?>">

                <div class="mb-3">
                    <label class="form-label">Stok Saat Ini</label>
                    <input type="number" class="form-control" value="<?= htmlspecialchars($barang['stok']) ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="stok_baru" class="form-label">Stok Baru</label>
                    <input type="number" class="form-control" id="stok_baru" name="stok_baru" min="0" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Penyesuaian</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
