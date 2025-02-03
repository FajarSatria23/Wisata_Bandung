<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logout-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #d9534f;
            border: none;
            border-radius: 3px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Logout Admin</h2>
        <p>Apakah Anda yakin ingin logout?</p>
        <form action="logout_process.php" method="POST">
            <input type="submit" value="Logout">
        </form>
        <a href="view_tempat_wisata.php" style="display: block; margin-top: 10px; color: #5cb85c; text-decoration: none;">Kembali ke Daftar Tempat Wisata</a>
    </div>
</body>
</html>