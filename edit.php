<?php
include('koneksi.php');
$db = new database();
$id_barang = $_GET['id'];

// Ambil data barang dari tabel barang1
$data_barang = $db->get_by_id($id_barang);

// Ambil data dari tabel relasi
$kategori_list = $db->get_all('kategori');
$supplier_list = $db->get_all('supplier');
$satuan_list = $db->get_all('satuan');
$lokasi_list = $db->get_all('lokasi');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img.thumb { width: 100px; height: auto; }
    </style>
</head>
<body class="container mt-5">
    <h3>Edit Data Barang</h3>
    <form method="post" action="proses_barang.php?action=update" enctype="multipart/form-data">
        <input type="hidden" name="id_barang" value="<?= $data_barang['id_barang']; ?>">

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="<?= $data_barang['nama_barang']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori_list as $kategori): ?>
                    <option value="<?= $kategori['id_kategori']; ?>" <?= $kategori['id_kategori'] == $data_barang['id_kategori'] ? 'selected' : '' ?>>
                        <?= $kategori['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Supplier</label>
            <select name="id_supplier" class="form-control" required>
                <option value="">-- Pilih Supplier --</option>
                <?php foreach ($supplier_list as $supplier): ?>
                    <option value="<?= $supplier['id_supplier']; ?>" <?= $supplier['id_supplier'] == $data_barang['id_supplier'] ? 'selected' : '' ?>>
                        <?= $supplier['nama_supplier']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <select name="id_satuan" class="form-control" required>
                <option value="">-- Pilih Satuan --</option>
                <?php foreach ($satuan_list as $satuan): ?>
                    <option value="<?= $satuan['id_satuan']; ?>" <?= $satuan['id_satuan'] == $data_barang['id_satuan'] ? 'selected' : '' ?>>
                        <?= $satuan['nama_satuan']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <select name="id_lokasi" class="form-control" required>
                <option value="">-- Pilih Lokasi --</option>
                <?php foreach ($lokasi_list as $lokasi): ?>
                    <option value="<?= $lokasi['id_lokasi']; ?>" <?= $lokasi['id_lokasi'] == $data_barang['id_lokasi'] ? 'selected' : '' ?>>
                        <?= $lokasi['nama_lokasi']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" value="<?= $data_barang['stok']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" value="<?= $data_barang['harga_beli']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" value="<?= $data_barang['harga_jual']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Gambar (Kosongkan jika tidak ingin diganti)</label><br>
            <?php if (!empty($data_barang['gambar'])): ?>
                <img src="uploads/<?= $data_barang['gambar']; ?>" alt="gambar" class="thumb mb-2"><br>
            <?php endif; ?>
            <input type="file" name="gambar" class="form-control">
            <input type="hidden" name="gambar_lama" value="<?= $data_barang['gambar']; ?>">
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
