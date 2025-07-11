<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil informasi dari session
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Kopi Juli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Kopi Juli</a>
        <div class="d-flex">
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="alert alert-success text-center">
        <h4>Selamat datang, <strong><?= htmlspecialchars($username) ?></strong>!</h4>
        <p>Anda login sebagai <strong><?= htmlspecialchars($role) ?></strong>.</p>
    </div>

    <!-- Konten Dashboard sesuai role -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dashboard</h5>
            <p class="card-text">Ini adalah halaman utama setelah login.</p>

            <?php if ($role === 'admin'): ?>
                <a href="admin-panel.php" class="btn btn-primary">Masuk ke Panel Admin</a>
            <?php else: ?>
                <a href="profil.php" class="btn btn-secondary">Lihat Profil</a>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
