<?php
session_start(); // Memulai sesi
session_destroy(); // Menghancurkan sesi
header("Location: view_tempat_wisata.php"); // Mengarahkan kembali ke halaman beranda
exit();
?>