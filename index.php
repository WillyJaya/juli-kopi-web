<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once 'koneksi.php';
$db = new database();

// Inisialisasi pencarian
$search = "";
$data_barang = [];

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $data_barang = $db->tampil_data($search);
} else {
    $data_barang = $db->tampil_data();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Stock Opname - Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img.thumb {
            width: 80px;
            height: auto;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Kopi Nusantara</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="halaman1.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="halaman2.php">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="halaman3.php">Menu Kopi</a></li>
                <li class="nav-item"><a class="nav-link" href="halaman4.php">Cara Penyeduhan</a></li>
                <li class="nav-item"><a class="nav-link" href="halaman5.php">Testimoni</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Stock Opname</a></li>
                <li class="nav-item"><a class="nav-link" href="lokasi.php">Lokasi</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
                <!-- Logout jika sudah login -->
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']); ?>)</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Konten -->
<div class="container mt-4">
    <h3 class="mb-3">Data Stok Bahan Baku Coffee Shop</h3>

    <!-- Search -->
    <form method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari barang..." value="<?= htmlspecialchars($search) ?>">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
            <a href="index.php" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    <!-- Tambah -->
    <a href="tambah_data.php" class="btn btn-success mb-3">+ Tambah Data</a>

    <!-- Tabel Data -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Satuan</th>
                <th>Lokasi</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($data_barang)): ?>
            <?php $no = 1; foreach ($data_barang as $barang): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?php if (!empty($barang['gambar'])): ?>
                            <img src="uploads/<?= htmlspecialchars($barang['gambar']); ?>" alt="Gambar" class="thumb">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada</span>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($barang['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($barang['nama_kategori']); ?></td>
                    <td><?= htmlspecialchars($barang['nama_supplier']); ?></td>
                    <td><?= htmlspecialchars($barang['nama_satuan']); ?></td>
                    <td><?= htmlspecialchars($barang['nama_lokasi']); ?></td>
                    <td><?= $barang['stok']; ?></td>
                    <td>Rp<?= number_format($barang['harga_beli'], 0, ',', '.'); ?></td>
                    <td>Rp<?= number_format($barang['harga_jual'], 0, ',', '.'); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $barang['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="proses_barang.php?action=delete&id=<?= $barang['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        <a href="penyesuaian.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-info btn-sm">Penyesuaian</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="11" class="text-center">Tidak ada data ditemukan.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
