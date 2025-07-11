<?php
session_start();
session_destroy();
header("Location: login.php");
exit;
?>

<!-- Ini tidak akan pernah terlihat jika redirect sukses -->
<h1>Berhasil Logout</h1>
