<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Kopi Juli</title>
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

<!-- PHP Handler -->
<?php
$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $pesan = htmlspecialchars($_POST["pesan"]);

    if ($nama && $email && $pesan) {
        $hasil = "<div class='alert alert-success'>Terima kasih, <strong>$nama</strong>. Pesan Anda telah diterima!<br>Email: $email<br>Pesan: $pesan</div>";
    } else {
        $hasil = "<div class='alert alert-danger'>Mohon lengkapi semua kolom sebelum mengirim.</div>";
    }
}
?>

<!-- Konten Halaman Kontak -->
<div class="container mt-5">
    <h2 class="text-center">Hubungi Kami</h2>
    <p class="text-center">Silakan hubungi kami melalui informasi di bawah ini atau kirim pesan langsung.</p>

    <div class="row mt-4">
        <!-- Informasi Kontak -->
        <div class="col-md-6">
            <h4>Informasi Kontak</h4>
            <p><strong>Alamat:</strong> Jl. Raya Bumi Anggrek No.1, Karangsatria, Tambun Utara, Bekasi, Jawa Barat</p>
            <p><strong>Telepon:</strong> <a href="tel:+6287789316999">+62 877-8931-6999</a></p>
            <p><strong>Email:</strong> <a href="mailto:kopijuli@gmail.com">kopijuli@gmail.com</a></p>
            <p><strong>Instagram:</strong> <a href="https://www.instagram.com/julikopi/" target="_blank">@julikopi</a></p>
            <p><strong>WhatsApp:</strong> <a href="https://wa.me/+6287789316999?text=*Halo%20Juli%20Kopi*%0A%0ASaya%20mau%20order" target="_blank">Chat via WhatsApp</a></p>
        </div>

        <!-- Formulir Kontak -->
        <div class="col-md-6">
            <h4>Kirim Pesan</h4>
            <?= $hasil ?>
            <form action="kontak.php" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda">
                </div>
                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda di sini"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
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
