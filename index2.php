<?php
include_once "koneksi.php"; // Menghubungkan ke database

// Tangkap input lokasi pengguna
$latitude = isset($_GET['lat']) ? (float)$_GET['lat'] : null;
$longitude = isset($_GET['lng']) ? (float)$_GET['lng'] : null;

// Query untuk mengambil data tempat wisata
$query = "SELECT * FROM tempat_wisata";
$result = mysqli_query($conn, $query);

// Jika query gagal, hentikan eksekusi dan tampilkan error
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

$places_within_radius = [];
if ($latitude !== null && $longitude !== null) {
    while ($row = mysqli_fetch_assoc($result)) {
        $distance = haversineGreatCircleDistance($latitude, $longitude, $row['latitude'], $row['longitude']);
        if ($distance <= 5) { // Radius 5 km
            $places_within_radius[] = $row;
        }
    }
}

// Fungsi untuk menghitung jarak menggunakan rumus Haversine
function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371) {
    $latitudeFrom = deg2rad($latitudeFrom);
    $longitudeFrom = deg2rad($longitudeFrom);
    $latitudeTo = deg2rad($latitudeTo);
    $longitudeTo = deg2rad($longitudeTo);

    $latDiff = $latitudeTo - $latitudeFrom;
    $lonDiff = $longitudeTo - $longitudeFrom;

    $a = sin($latDiff / 2) * sin($latDiff / 2) +
         cos($latitudeFrom) * cos($latitudeTo) *
         sin($lonDiff / 2) * sin($lonDiff / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    return $earthRadius * $c; // Mengembalikan jarak dalam kilometer
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata dalam Radius 5 km</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />
    <style>
        #map {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="text-center mb-4">Tempat Wisata dalam Radius 5 km</h1>
        <button onclick="getLocation()" class="btn btn-primary mb-3">Dapatkan Lokasi Saya</button>
        <a href="index.php" class="btn btn-secondary mb-3">Kembali ke Home</a>
        
        <div id="map"></div>

        <div class="table-wrapper">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama Tempat</th>
                <th>Jarak (km)</th>
                <th>Peta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($places_within_radius as $place): ?>
                <tr>
                    <td><?php echo htmlspecialchars($place['nama']); ?></td>
                    <td><?php echo round(haversineGreatCircleDistance($latitude, $longitude, $place['latitude'], $place['longitude']), 2); ?></td>
                    <td><a href='peta2.php?id=<?php echo $place['id']; ?>' class='btn btn-info btn-sm'>Lihat Peta</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFqYXJzcCIsImEiOiJjbTY0c255b2sxbzIyMmtvOHllampkbjFoIn0.FmGuoz56AuWGeM1vfEuXEQ';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [<?php echo $longitude; ?>, <?php echo $latitude; ?>], // Koordinat awal
            zoom: 12
        });

        // Menambahkan marker untuk setiap tempat wisata dalam radius
        <?php foreach ($places_within_radius as $place): ?>
            new mapboxgl.Marker()
                .setLngLat([<?php echo $place['longitude']; ?>, <?php echo $place['latitude']; ?>])
                .setPopup(new mapboxgl.Popup().setHTML("<h3><?php echo htmlspecialchars($place['nama']); ?></h3>"))
                .addTo(map);
        <?php endforeach; ?>

        // Menambahkan marker untuk lokasi pengguna
        if (<?php echo $latitude !== null && $longitude !== null ? 'true' : 'false'; ?>) {
            new mapboxgl.Marker({ color: 'red' })
                .setLngLat([<?php echo $longitude; ?>, <?php echo $latitude; ?>])
                .setPopup(new mapboxgl.Popup().setHTML("<h3>Lokasi Anda</h3>"))
                .addTo(map);
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            window.location.href = `index2.php?lat=${latitude}&lng=${longitude}`;
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User  denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>