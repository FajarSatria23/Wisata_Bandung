<?php
session_start();
include "koneksi.php"; // Menghubungkan ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Arahkan ke login.php jika belum login
    exit();
}

// Ambil ID dari URL
$id = $_GET['id'];

// Proses penghapusan data
if (isset($id)) {
    $query = "DELETE FROM tempat_wisata WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman view_tempat_wisata.php setelah berhasil menghapus data
        header("Location: view_tempat_wisata.php");
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . mysqli_error($conn) . "</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>ID tidak ditemukan!</div>";
}
?>