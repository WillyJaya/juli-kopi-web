<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function 1: Menghitung total harga dari semua item
function hitungTotalHarga($menu) {
    $total = 0;
    foreach ($menu as $item) {
        $total += $item['harga'];
    }
    return $total;
}

// Procedure 1: Menampilkan menu signature
function tampilkanSignatureMenu($nama, $deskripsi) {
    echo "<div class='alert alert-info mt-3 text-center'><strong>Signature Menu:</strong> $nama - $deskripsi</div>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Kopi Juli</title>
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

<!-- Konten Menu -->
<div class="container mt-5">
    <h2 class="text-center">Menu Kopi Juli</h2>
    <p class="text-center">Temukan pilihan kopi terbaik kami</p>
    <div class="row">
        <?php
        // Looping #1: foreach
        $menu = [
            ["gambar" => "images/Screenshot 2025-03-18 200206.png", "nama" => "Menu", "deskripsi" => "Menu Lengkap", "harga" => 0],
            ["gambar" => "images/roti.png", "nama" => "Roti Srikaya", "deskripsi" => "Roti isi selai srikaya lembut", "harga" => 5000],
            ["gambar" => "images/Screenshot 2025-03-18 200139.png", "nama" => "White Cold Brew", "deskripsi" => "Kopi dingin dengan susu segar", "harga" => 20000]
        ];

        foreach ($menu as $item) {
            echo "
            <div class='col-md-4 mb-4'>
                <div class='card'>
                    <img src='{$item['gambar']}' class='card-img-top' alt='{$item['nama']}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$item['nama']}</h5>
                        <p class='card-text'>{$item['deskripsi']}</p>
                        <p class='fw-bold'>Rp " . number_format($item['harga'], 0, ',', '.') . "</p>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>

    <!-- Looping #2: for - promo -->
    <div class="mt-5">
        <h4 class="text-center">Promo Spesial Hari Ini</h4>
        <ul class="list-group list-group-flush">
            <?php
            for ($i = 1; $i <= 3; $i++) {
                echo "<li class='list-group-item'>Diskon {$i}0% untuk pembelian ke-{$i}</li>";
            }
            ?>
        </ul>
    </div>

    <!-- Function: Total harga -->
    <div class="mt-4 text-center">
        <h5>Total Harga Semua Item: <span class="text-success">Rp <?= number_format(hitungTotalHarga($menu), 0, ',', '.') ?></span></h5>
    </div>

    <!-- Procedure: Signature menu -->
    <?php tampilkanSignatureMenu("Kopi Aren Latte", "Kopi susu dengan gula aren khas Kopi Juli"); ?>

    <!-- Form Input -->
    <div class="mt-5">
        <h4 class="text-center">Form Pemesanan Cepat</h4>
        <form method="POST" class="col-md-6 mx-auto">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="menu" class="form-label">Pesanan</label>
                <select class="form-select" name="menu">
                    <option value="Roti Srikaya">Roti Srikaya</option>
                    <option value="White Cold Brew">White Cold Brew</option>
                    <option value="Kopi Aren Latte">Kopi Aren Latte</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namaPemesan = htmlspecialchars($_POST['nama']);
            $menuDipilih = htmlspecialchars($_POST['menu']);
            echo "<div class='alert alert-success mt-3 text-center'>
                    Terima kasih <strong>$namaPemesan</strong>, pesanan Anda untuk <strong>$menuDipilih</strong> telah dicatat.
                  </div>";
        }
        ?>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Kopi Juli. Semua Hak Dilindungi.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
