<?php
session_start();
include_once "koneksi.php"; // Menghubungkan ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Arahkan ke login.php jika belum login
    exit();
}

// Proses penambahan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);

    $query = "INSERT INTO tempat_wisata (nama, kategori, deskripsi, alamat, latitude, longitude) VALUES ('$nama', '$kategori', '$deskripsi', '$alamat', '$latitude', '$longitude')";

    // Cek apakah query berhasil
    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman view_tempat_wisata.php setelah berhasil menambahkan data
        header("Location: view_tempat_wisata.php");
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1 class="text-center mb-4">Tambah Tempat Wisata</h1>
        <form method="POST" action="add_tempat_wisata.php">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>