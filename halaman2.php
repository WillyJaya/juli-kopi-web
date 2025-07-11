<?php
session_start(); // agar bisa cek $_SESSION['username']
setcookie("pengunjung", "Pecinta Kopi", time() + 1800); // cookie 30 menit
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Percabangan 1: if-else
$jam = date("H");
if ($jam < 12) {
    $salam = "Selamat pagi, pecinta kopi!";
} elseif ($jam < 18) {
    $salam = "Selamat sore, waktunya ngopi!";
} else {
    $salam = "Selamat malam, nikmati kopi hangat sebelum tidur!";
}

// Percabangan 2: switch
$hari = date("l");
switch ($hari) {
    case "Monday":
        $promo = "Senin semangat! Dapatkan diskon 20% untuk semua jenis espresso.";
        break;
    case "Friday":
        $promo = "Jumat ceria! Beli 1 gratis 1 untuk semua minuman dingin.";
        break;
    case "Sunday":
        $promo = "Minggu santai! Gratis topping untuk semua jenis kopi.";
        break;
    default:
        $promo = "Nikmati promo spesial setiap hari di Kopi Juli!";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kopi Juli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="halaman1.php">Kopi Juli</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="halaman1.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Tentang Kami</a></li>
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

<!-- Header -->
<header class="bg-dark text-white text-center py-5">
    <h1><?= $salam ?></h1>
    <p><?= $promo ?></p>
</header>

<!-- Konten Halaman Tentang -->
<div class="container mt-5">
    <h2 class="text-center">Tentang Kami</h2>
    <p class="text-center">Kopi Juli adalah kedai kopi yang menghadirkan pengalaman menikmati kopi berkualitas tinggi dengan cita rasa yang otentik.</p>

    <!-- Sejarah -->
    <div class="mt-4">
        <h3>Sejarah Kopi Juli</h3>
        <p>Kopi Juli didirikan pada tahun 2021 oleh Kevin dengan tujuan menghadirkan kopi berkualitas dari petani lokal Indonesia.</p>
    </div>

    <!-- Visi Misi -->
    <div class="mt-4">
        <h3>Visi & Misi</h3>
        <ul>
            <li><strong>Visi:</strong> Menjadi kedai kopi pilihan utama bagi pecinta kopi di Indonesia.</li>
            <li><strong>Misi:</strong>
                <ul>
                    <li>Menyajikan kopi berkualitas tinggi dengan bahan baku terbaik.</li>
                    <li>Mendukung petani lokal melalui kemitraan berkelanjutan.</li>
                    <li>Mengedukasi masyarakat tentang budaya dan teknik penyeduhan kopi.</li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Keunggulan -->
    <div class="mt-4">
        <h3>Keunggulan Kami</h3>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="images/tentang3.png" class="img-fluid" alt="Kopi Berkualitas">
                <p>Kopi berkualitas dari petani pilihan</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="images/tentang.png" class="img-fluid" alt="Teknik Penyeduhan Modern">
                <p>Teknik penyeduhan modern yang menjaga rasa</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="images/tentang2.png" class="img-fluid" alt="Suasana Nyaman">
                <p>Tempat nyaman untuk bersantai dan ngopi</p>
            </div>
        </div>
    </div>

    <!-- LOOPING 1: Foreach daftar pendiri -->
    <div class="mt-5">
        <h3>Pendiri Kopi Juli</h3>
        <ul>
        <?php
        $pendiri = ["Kevin"];
        foreach ($pendiri as $nama) {
            echo "<li>$nama</li>";
        }
        ?>
        </ul>
    </div>

    <!-- LOOPING 2: For tahun perkembangan -->
    <div class="mt-4">
        <h3>Perjalanan Tahun ke Tahun</h3>
        <ol>
        <?php
        for ($tahun = 2021; $tahun <= 2025; $tahun++) {
            echo "<li>Perkembangan usaha tahun $tahun</li>";
        }
        ?>
        </ol>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Kopi Juli. Semua Hak Dilindungi.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
