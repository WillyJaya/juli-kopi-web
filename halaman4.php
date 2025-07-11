<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara Penyeduhan - Kopi Juli</title>
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

<!-- PHP Bagian -->
<?php
// Array 1: Daftar alat seduh
$alatSeduh = ["Grinder", "Timbangan", "Dripper", "Filter", "Cangkir", "Ketel Air"];

// Array 2: Suhu ideal untuk metode tertentu
$suhuIdeal = [
    "V60" => "92°C",
    "French Press" => "96°C",
    "AeroPress" => "85°C"
];

// Procedure
function tampilkanAlat($alatArray) {
    echo "<ul class='list-group'>";
    foreach ($alatArray as $alat) {
        echo "<li class='list-group-item'>{$alat}</li>";
    }
    echo "</ul>";
}

// Function
function tampilkanLangkah() {
    $langkah = [
        "Giling biji kopi secukupnya (medium grind).",
        "Panaskan air hingga suhu ideal (90-96°C).",
        "Basahi kertas filter dengan air panas.",
        "Masukkan bubuk kopi ke dripper.",
        "Lakukan blooming: tuang 30ml air dan tunggu 30 detik.",
        "Tuang sisa air secara bertahap.",
        "Tunggu hingga tetesan kopi selesai.",
        "Sajikan dan nikmati."
    ];

    echo "<ol>";
    foreach ($langkah as $step) {
        echo "<li>{$step}</li>";
    }
    echo "</ol>";
}
?>

<!-- Konten -->
<div class="container mt-5">
    <h2 class="text-center">Cara Penyeduhan Kopi dengan Metode Manual Brew</h2>
    <p class="text-center">Ikuti langkah-langkah berikut agar kopi memiliki rasa terbaik seperti di video tutorial.</p>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Alat & Bahan</h4>
            <?php tampilkanAlat($alatSeduh); ?>

            <h4 class="mt-4">Langkah-langkah Penyeduhan</h4>
            <?php tampilkanLangkah(); ?>

            <h4 class="mt-4">Suhu Ideal per Metode</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Metode</th>
                        <th>Suhu Ideal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suhuIdeal as $metode => $suhu): ?>
                        <tr>
                            <td><?= $metode ?></td>
                            <td><?= $suhu ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Embed YouTube Video -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 text-center">
            <h4>Video Tutorial Penyeduhan</h4>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/ReIHzl3CTN4" title="Cara Menyeduh Kopi" allowfullscreen></iframe>
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
