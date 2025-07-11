<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Cek login manual (hardcoded)
if ($username === 'Kevin' && $password === 'Chandra') {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'admin'; // bisa diganti jika ingin role tertentu
    header("Location: index.php");
    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}
