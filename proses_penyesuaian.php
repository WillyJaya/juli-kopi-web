<?php
include 'koneksi.php';
$db = new database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_barang = $_POST['id_barang'] ?? null;
    $stok_baru = $_POST['stok_baru'] ?? null;

    if ($id_barang !== null && $stok_baru !== null) {
        $conn = $db->get_connection(); // Sekarang ini valid
        $query = "UPDATE barang SET stok = ? WHERE id_barang = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ii", $stok_baru, $id_barang);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("Location: index.php?pesan=stok_diupdate");
            exit;
        } else {
            echo "Gagal menyiapkan pernyataan. <a href='index.php'>Kembali</a>";
        }
    } else {
        echo "Data tidak lengkap. <a href='index.php'>Kembali</a>";
    }
} else {
    echo "Metode tidak diizinkan. <a href='index.php'>Kembali</a>";
}
