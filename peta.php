<?php
include_once "koneksi.php";

// Tangkap ID dari URL
$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

// Query data berdasarkan ID
$query = "SELECT * FROM tempat_wisata WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $nama = $row['nama'];
    $kategori = $row['kategori'];
    $alamat = $row['alamat'];
    $deskripsi = $row['deskripsi'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
} else {
    die("Data tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Lokasi - <?= htmlspecialchars($nama) ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"/>
    <!-- Custom CSS -->
    <style>
        /* Atur tinggi peta */
        #map {
            width: 100%;
            height: 400px;
            margin-bottom: 20px;
        }

        /* Gaya judul dan detail */
        .detail-container {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
</head>
<body class="bg-light">

<div class="container my-4">
    <h1 class="text-center mb-4">Detail Lokasi: <?= htmlspecialchars($nama) ?></h1>

    <!-- Peta -->
    <div id="map"></div>

    <!-- Detail Wisata -->
    <div class="detail-container">
        <h2><?= htmlspecialchars($nama) ?></h2>
        <p><strong>Kategori:</strong> <?= htmlspecialchars($kategori) ?></p>
        <p><strong>Alamat:</strong> <?= htmlspecialchars($alamat) ?></p>
        <p><strong>Deskripsi:</strong> <?= htmlspecialchars($deskripsi) ?></p>
        <p id="distance"></p> <!-- Tempat untuk menampilkan jarak -->
        <a href="index1.php" class="btn btn-secondary mt-3">Kembali ke Daftar Wisata</a>
    </div>
</div>

<script>
    // Inisialisasi peta
    var map = L.map('map').setView([<?= $latitude ?>, <?= $longitude ?>], 15);

    // Tambahkan tile layer dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Tambahkan marker di lokasi tempat wisata
    L.marker([<?= $latitude ?>, <?= $longitude ?>]).addTo(map)
        .bindPopup('<b><?= htmlspecialchars($nama) ?></b><br><?= htmlspecialchars($alamat) ?>')
        .openPopup();

    // Mendapatkan lokasi pengguna
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation tidak didukung oleh browser ini.");
    }

    function showPosition(position) {
        const userLatitude = position.coords.latitude;
        const userLongitude = position.coords.longitude;

        // Tambahkan marker untuk lokasi pengguna
        L.marker([userLatitude, userLongitude]).addTo(map)
            .bindPopup('<b>Lokasi Anda</b>')
            .openPopup();

        // Pindahkan peta untuk menampilkan lokasi pengguna
        map.setView([userLatitude, userLongitude], 15);

        // Hitung jarak dari lokasi pengguna ke lokasi tempat wisata
        // Hitung jarak dari lokasi pengguna ke lokasi tempat wisata
const distance = haversineDistance(userLatitude, userLongitude, <?= $latitude ?>, <?= $longitude ?>);
document.getElementById('distance').innerHTML = '<strong>Jarak ke lokasi ini:</strong> ' + distance.toFixed(2) + ' km';
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("Pengguna menolak permintaan untuk Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Informasi lokasi tidak tersedia.");
                break;
            case error.TIMEOUT:
                alert("Permintaan untuk mendapatkan lokasi pengguna telah timeout.");
                break;
            case error.UNKNOWN_ERROR:
                alert("Terjadi kesalahan yang tidak diketahui.");
                break;
        }
    }

    // Fungsi untuk menghitung jarak menggunakan rumus Haversine
    function haversineDistance(lat1, lon1, lat2, lon2, earthRadius = 6371) {
        const latDiff = (lat2 - lat1) * Math.PI / 180;
        const lonDiff = (lon2 - lon1) * Math.PI / 180;

        const a = Math.sin(latDiff / 2) * Math.sin(latDiff / 2) +
                  Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                  Math.sin(lonDiff / 2) * Math.sin(lonDiff / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

        return earthRadius * c; // Mengembalikan jarak dalam kilometer
    }
</script>

</body>
</html>