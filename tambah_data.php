<?php
include 'koneksi.php';
$db = new database();

// Ambil data relasi dari tabel terkait
$kategori = $db->get_all('kategori') ?? [];
$supplier = $db->get_all('supplier') ?? [];
$satuan   = $db->get_all('satuan') ?? [];
$lokasi   = $db->get_all('lokasi') ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h3 class="mb-4">Tambah Data Barang</h3>

    <form method="post" action="proses_barang.php?action=add" enctype="multipart/form-data" autocomplete="off">

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" id="stok" name="stok" class="form-control" min="0" required>
        </div>

        <div class="mb-3">
            <label for="harga_beli" class="form-label">Harga Beli</label>
            <input type="number" id="harga_beli" name="harga_beli" class="form-control" min="0" required>
        </div>

        <div class="mb-3">
            <label for="harga_jual" class="form-label">Harga Jual</label>
            <input type="number" id="harga_jual" name="harga_jual" class="form-control" min="0" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select id="id_kategori" name="id_kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= htmlspecialchars($k['id_kategori']) ?>">
                        <?= htmlspecialchars($k['nama_kategori']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_supplier" class="form-label">Supplier</label>
            <select id="id_supplier" name="id_supplier" class="form-select" required>
                <option value="">-- Pilih Supplier --</option>
                <?php foreach ($supplier as $s): ?>
                    <option value="<?= htmlspecialchars($s['id_supplier']) ?>">
                        <?= htmlspecialchars($s['nama_supplier']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_satuan" class="form-label">Satuan</label>
            <select id="id_satuan" name="id_satuan" class="form-select" required>
                <option value="">-- Pilih Satuan --</option>
                <?php foreach ($satuan as $sat): ?>
                    <option value="<?= htmlspecialchars($sat['id_satuan']) ?>">
                        <?= htmlspecialchars($sat['nama_satuan']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select id="id_lokasi" name="id_lokasi" class="form-select" required>
                <option value="">-- Pilih Lokasi --</option>
                <?php foreach ($lokasi as $l): ?>
                    <option value="<?= htmlspecialchars($l['id_lokasi']) ?>">
                        <?= htmlspecialchars($l['nama_lokasi']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
    </form>

</body>
</html>
