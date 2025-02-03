<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }
        .team-members {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .team-member {
            background-color: #fff;
            padding: 20px;
            margin: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 45%; /* Lebar masing-masing card */
        }
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        h1 {
            color: #007BFF;
        }
        @media (max-width: 768px) {
            .team-member {
                width: 100%; /* Lebar penuh untuk layar lebih kecil */
            }
        }
        .vertical-text {
            font-weight: light; /* Membuat teks menjadi bold */
            display: flex;
            flex-direction: column; /* Menyusun kata-kata secara vertikal */
            align-items: center;
            text-align: center;
            line-height: 1; /* Mengatur jarak antar kata */
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h1>Meet Our Team</h1>
        <div class="team-members">
            <?php
            // Daftar anggota tim dengan nama, NIM, dan link gambar
            $team = [
                ['name' => 'Audrey Mediliani', 'nim' => '10122283', 'image' => '../tubesPTI3/img/audrey.jpeg'],
                ['name' => ' Laras Almanna Salwa', 'nim' => '10122285', 'image' => '../tubesPTI3/img/laras.jpeg'],
                ['name' => 'Dimas Adhi Negoro', 'nim' => '10122295', 'image' => '../tubesPTI3/img/dimas.jpeg'],
                ['name' => 'Muhammad Fajar Satria Pamungkas', 'nim' => '10122310', 'image' => '../tubesPTI3/img/fajar.jpeg'],
            ];

            // Menampilkan anggota tim dengan gambar
            foreach ($team as $member) {
                echo "<div class='team-member'>";
                echo "<img src='{$member['image']}' alt='{$member['name']}'>";
                echo "<h2>{$member['name']}</h2>";
                echo "<p>NIM: {$member['nim']}</p>";
                echo "</div>";
            }
            ?>
        </div>
        <div>
            <h2>Kata-kata hari ini: </h2>
            <div class="vertical-text">
               <br> Belajar giat hingga larut, Sambil minum kopi yang hangat. </br> 
               <br>Semester lima memang berat, Tapi kita pasti bisa kuat!</br>
               <br>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
