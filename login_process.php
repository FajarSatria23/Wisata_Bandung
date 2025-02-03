<?php
session_start();
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "wisata_bandung";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$user = $_POST['username'];
$pass = md5($_POST['password']); // Enkripsi password

// Query untuk memeriksa username dan password
$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION['username'] = $user;
    header("Location: view_tempat_wisata.php"); // Arahkan ke index.php
    exit(); // Pastikan untuk keluar setelah mengalihkan
} else {
    // Login gagal
    echo "Username atau password salah!";
}

$conn->close();
?>