<?php
session_start();
include "koneksi.php"; // Menghubungkan ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Arahkan ke login.php jika belum login
    exit();
}

// Query untuk mengambil data tempat wisata
$query = "SELECT * FROM tempat_wisata";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1 class="text-center mb-4">Daftar Tempat Wisata</h1>
        
        <div class="mb-3 d-flex justify-content-between">
            <a href="add_tempat_wisata.php" class="btn btn-success">Tambah Tempat Wisata</a>
            <a href="logout.php" class="btn btn-danger">Logout</a> <!-- Tombol Logout -->
        </div>
        
        <!-- Tabel Data dalam Pembungkus -->
        <div class="table-wrapper">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>" . htmlspecialchars($row['nama']) . "</td>
                                    <td>" . htmlspecialchars($row['kategori']) . "</td>
                                    <td>" . htmlspecialchars($row['alamat']) . "</td>
                                    <td>" . htmlspecialchars($row['deskripsi']) . "</td>
                                    <td>" . htmlspecialchars($row['latitude']) . "</td>
                                    <td>" . htmlspecialchars($row['longitude']) . "</td>
                                    <td>
                                        <a href='edit_tempat_wisata.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='delete_tempat_wisata.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a>
                                    </td>
                                  </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>Tidak ada data ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>