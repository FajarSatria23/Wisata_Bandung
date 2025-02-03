<?php
include_once "koneksi.php"; // Menghubungkan ke database

// Tangkap input pencarian
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$selected_category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';

// Query untuk mengambil kategori yang ada
$category_query = "SELECT DISTINCT kategori FROM tempat_wisata";
$category_result = mysqli_query($conn, $category_query);

// Query data tempat wisata
$query = "SELECT * FROM tempat_wisata";
$conditions = [];

if (!empty($search)) {
    $conditions[] = "(nama LIKE '%$search%' OR kategori LIKE '%$search%' OR alamat LIKE '%$search%')";
}

if (!empty($selected_category)) {
    $conditions[] = "kategori = '$selected_category'";
}

if (count($conditions) > 0) {
    $query .= " WHERE " . implode(' AND ', $conditions);
}

$result = mysqli_query($conn, $query);

// Jika query gagal, hentikan eksekusi dan tampilkan error
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Wisata Bandung</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Slideshow Styling */
    .slideshow-container {
      position: relative;
      width: 100%;
      height: 300px;
      overflow: hidden;
      margin-bottom: 20px;
    }
    .slideshow-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      animation: fade 10s infinite;
    }
    .slideshow-container img:nth-child(1) {
      animation-delay: 0s;
    }
    .slideshow-container img:nth-child(2) {
      animation-delay: 3s;
    }
    /* Animasi Gambar */
    @keyframes fade {
      0%, 100% { opacity: 0; }
      33% { opacity: 1; }
    }
    .table-wrapper {
      max-height: 600px;
      overflow-y: auto;
      width: 100%;        /* Mengisi lebar kontainer */
      max-width: 100%;   /* Lebar maksimum 800px */
    }
  </style>
</head>
<body class="bg-light">

  <!-- Slideshow -->
  <div class="slideshow-container">
    <img src="img/wisata1.png" alt="Gambar 1">
    <img src="img/wisata2.png" alt="Gambar 2">
  </div>

  <div class="container py-4">
    <h1 class="text-center mb-4">Daftar Wisata Bandung</h1>
    <!-- Form Pencarian -->
    <form method="GET" action="index1.php" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari tempat wisata..." value="<?= htmlspecialchars($search) ?>">
        <select name="category" class="form-select me-2">
            <option value="">Semua Kategori</option>
            <?php while ($category_row = mysqli_fetch_assoc($category_result)): ?>
                <option value="<?= htmlspecialchars($category_row['kategori']) ?>" <?= $selected_category == $category_row['kategori'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category_row['kategori']) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

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
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nama']}</td>
                                <td>{$row['kategori']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['deskripsi']}</td>
                                <td><a href='peta.php?id={$row['id']}' class='btn btn-info btn-sm'>Lihat Peta</a></td>
                          </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Tidak ada data ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali ke Home</a>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
