<?php
session_start(); // Penting: wajib untuk menggunakan $_SESSION

$judulWebsite = "Kopi Juli";
$tagline = "Temukan cita rasa kopi terbaik dari berbagai daerah di Indonesia.";
$promoHariIni = "Promo hari ini: Diskon 20% untuk semua jenis kopi!";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judulWebsite; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        #scrollTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }
        .hidden {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }
        .visible {
            opacity: 1;
            transform: translateY(0);
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
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout (<?= htmlspecialchars($_SESSION['username']); ?>)</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Beranda -->
<section id="beranda" class="p-5 text-center bg-light hidden">
    <h1><?= $judulWebsite; ?></h1>
    <p><?= $tagline; ?></p>
    <img src="images/logo-removebg-preview.png" class="img-fluid" alt="Kopi Juli">
</section>

<!-- Slideshow -->
<section class="p-5 text-center">
    <h2><?= $promoHariIni; ?></h2>  
    <a href="https://www.instagram.com/p/ChW7KQBJ7Cj/" target="_blank">
        <img id="slideshow" src="images/kopi1.jpg" class="img-fluid" alt="Promo Kopi">
    </a>
</section>

<audio autoplay loop>
    <source src="music/10 Minutes Coffee Shop Music.mp3" type="audio/mp3"/>
</audio>

<!-- Form Kontak -->
<section id="kontak" class="p-5 bg-light text-center">
    <h2>Hubungi Kami</h2>
    <form id="contactForm">
        <input type="text" id="name" placeholder="Nama" required>
        <input type="email" id="email" placeholder="Email" required>
        <button type="submit">Kirim</button>
    </form>
</section>

<!-- Tombol Scroll ke Atas -->
<button id="scrollTop" class="btn btn-primary">↑</button>

<script>
    // Scroll ke Atas
    const scrollTopBtn = document.getElementById('scrollTop');
    window.addEventListener('scroll', () => {
        scrollTopBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
    });
    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Efek animasi
    const sections = document.querySelectorAll('.hidden');
    window.addEventListener('scroll', () => {
        sections.forEach(sec => {
            if (sec.getBoundingClientRect().top < window.innerHeight - 50) {
                sec.classList.add('visible');
            }
        });
    });

    // Slideshow
    const slideshowImages = ["images/kopi1.jpg", "images/kopi2.jpg", "images/kopi3.jpg"];
    let currentImageIndex = 1;
    setInterval(() => {
        document.getElementById('slideshow').src = slideshowImages[currentImageIndex];
        currentImageIndex = (currentImageIndex + 1) % slideshowImages.length;
    }, 3000);

    // Notifikasi Selamat Datang
    window.onload = () => alert("Selamat datang di <?= $judulWebsite; ?>! Nikmati secangkir kopi terbaik.");

    // Validasi Form Kontak
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let name = document.getElementById('name').value.trim();
        let email = document.getElementById('email').value.trim();
        if (!name || !email) {
            alert("Harap isi semua kolom!");
        } else {
            alert("Terima kasih, " + name + "! Kami akan menghubungi Anda segera.");
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
