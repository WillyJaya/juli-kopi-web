<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Kopi Juli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Kopi Juli</a>
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
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']); ?>)</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Konten Blog -->
<div class="container mt-5">
    <h2 class="text-center">Blog Kopi Juli</h2>
    <p class="text-center">Temukan berbagai artikel menarik tentang kopi!</p>

    <div class="row">
        <!-- Artikel 1 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="images/sejarah.jpg" class="card-img-top" alt="Sejarah Kopi">
                <div class="card-body">
                    <h5 class="card-title">Sejarah Kopi di Dunia</h5>
                    <p class="card-text">Kopi telah menjadi bagian dari kehidupan manusia selama berabad-abad. Dari Ethiopia hingga ke seluruh dunia...</p>
                    <a href="https://id.wikipedia.org/wiki/Sejarah_kopi" class="btn btn-primary" target="_blank">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Artikel 2 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="images/Blog-Pilih-Kopi-Berkualitas.jpeg" class="card-img-top" alt="Cara Memilih Biji Kopi">
                <div class="card-body">
                    <h5 class="card-title">Cara Memilih Biji Kopi yang Berkualitas</h5>
                    <p class="card-text">Memilih biji kopi yang berkualitas sangat penting untuk mendapatkan cita rasa terbaik. Berikut adalah beberapa tips...</p>
                    <a href="https://gokomodo.com/blog/5-cara-memilih-biji-kopi-berkualitas-untuk-diseduh" class="btn btn-primary" target="_blank">Baca Selengkapnya</a>
                </div>
            </div>
        </div>

        <!-- Artikel 3 -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="images/manfaat.jpeg" class="card-img-top" alt="Manfaat Minum Kopi">
                <div class="card-body">
                    <h5 class="card-title">Manfaat Minum Kopi untuk Kesehatan</h5>
                    <p class="card-text">Tahukah kamu bahwa kopi memiliki banyak manfaat bagi kesehatan? Simak beberapa manfaat yang mungkin belum kamu ketahui...</p>
                    <a href="https://www.halodoc.com/artikel/11-manfaat-kopi-hitam-untuk-kesehatan-tubuh" class="btn btn-primary" target="_blank">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Kopi Juli. Semua Hak Dilindungi.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
