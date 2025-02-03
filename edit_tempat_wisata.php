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

// Ambil data tempat wisata berdasarkan ID
$query = "SELECT * FROM tempat_wisata WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Jika data tidak ditemukan, arahkan kembali
if (!$row) {
    echo "Data tidak ditemukan!";
    exit();
}

// Proses update data
$msg = "";
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);

    $update = mysqli_query($conn, "UPDATE tempat_wisata SET nama='$nama', kategori='$kategori', deskripsi='$deskripsi', alamat='$alamat', latitude='$latitude', longitude='$longitude' WHERE id='$id'");
    if ($update) {
        $msg = "Data berhasil diperbarui!";
        // Redirect ke halaman view_tempat_wisata.php setelah berhasil memperbarui data
        header("Location: view_tempat_wisata.php");
        exit();
    } else {
        $msg = "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tempat Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1 class="text-center mb-4">Edit Tempat Wisata</h1>
        <?php if ($msg): ?>
            <div class="alert alert-info"><?php echo $msg; ?></div>
        <?php endif; ?>
        <form method="POST" action="edit_tempat_wisata.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo htmlspecialchars($row['kategori']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo htmlspecialchars($row['deskripsi']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo htmlspecialchars($row['latitude']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo htmlspecialchars($row['longitude']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>
</html>