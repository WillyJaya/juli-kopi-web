<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('koneksi.php');
$db = new database();

$action = $_GET['action'] ?? '';

$folder = "uploads/";

// Buat folder uploads jika belum ada
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if ($action === "add") {
    $nama_gambar = basename($_FILES['gambar']['name']);
    $tmp_gambar  = $_FILES['gambar']['tmp_name'];

    if (!empty($nama_gambar)) {
        $target_path = $folder . $nama_gambar;
        if (!move_uploaded_file($tmp_gambar, $target_path)) {
            die("Upload gambar gagal. <a href='tambah_data.php'>Kembali</a>");
        }
    } else {
        $nama_gambar = null;
    }

    $result = $db->tambah_data(
        $_POST['nama_barang'],
        $_POST['stok'],
        $_POST['harga_beli'],
        $_POST['harga_jual'],
        $nama_gambar,
        $_POST['id_kategori'],
        $_POST['id_supplier'],
        $_POST['id_satuan'],
        $_POST['id_lokasi']
    );

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        die("Gagal menambahkan data. <a href='tambah_data.php'>Kembali</a>");
    }

} elseif ($action === "update") {
    $id          = $_POST['id_barang'];
    $gambar_baru = basename($_FILES['gambar']['name']);
    $tmp_gambar  = $_FILES['gambar']['tmp_name'];

    if (!empty($gambar_baru)) {
        $target_path = $folder . $gambar_baru;
        if (!move_uploaded_file($tmp_gambar, $target_path)) {
            die("Upload gambar gagal. <a href='edit.php?id=$id'>Kembali</a>");
        }
        $nama_gambar = $gambar_baru;
    } else {
        $nama_gambar = $_POST['gambar_lama'];
    }

    $result = $db->update_data(
        $_POST['nama_barang'],
        $_POST['stok'],
        $_POST['harga_beli'],
        $_POST['harga_jual'],
        $nama_gambar,
        $_POST['id_kategori'],
        $_POST['id_supplier'],
        $_POST['id_satuan'],
        $_POST['id_lokasi'],
        $id
    );

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        die("Gagal mengupdate data. <a href='edit.php?id=$id'>Kembali</a>");
    }

} elseif ($action === "delete") {
    $id = $_GET['id'];
    $db->delete_data($id);
    header("Location: index.php");
    exit;

} else {
    die("Aksi tidak dikenal.");
}
?>
