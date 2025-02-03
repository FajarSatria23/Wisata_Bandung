<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('../tubesPTI3/img/bandung.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Menambahkan transparansi pada overlay */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .btn {
            transition: transform 0.2s;
        }
        .btn:hover {
            transform: scale(1.1);
        }
        h1 {
            animation: fadeIn 2s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        /* Memastikan tombol about dan admin berada di pojok kanan atas */
        .top-right {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 2; /* Pastikan tombol berada di atas overlay */
        }
    </style>
</head>
<body>
    <div class="top-right">
        <a href="about.php" class="btn btn-dark btn-sm">About</a>
        <a href="login.php" class="btn btn-dark btn-sm">Admin</a>
    </div>
    <div class="overlay">
        <div class="container">
            <h1 class="mb-4">Selamat Datang di Aplikasi Wisata Bandung</h1>
            <div class="text-center">
                <a href="index1.php" class="btn btn-primary btn-lg mb-3">Cari Wisata</a>
                <br>
                <a href="index2.php" class="btn btn-success btn-lg">Cari Wisata Sekitar Saya</a>
            </div>
        </div>
    </div>
</body>
</html>