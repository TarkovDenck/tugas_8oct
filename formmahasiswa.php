<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 12px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .result {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .result h3 {
            margin-top: 0;
            color: #333;
        }

        .result p {
            margin: 10px 0;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Input Data</h2>
        
        <!-- Form untuk input data -->
        <form action="" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="kelas">Kelas:</label>
            <input type="text" id="kelas" name="kelas" required>

            <label for="nilai_tugas">Nilai Tugas:</label>
            <input type="text" id="nilai_tugas" name="nilai_tugas" required>

            <label for="nilai_project">Nilai Project:</label>
            <input type="text" id="nilai_project" name="nilai_project" required>

            <label for="nilai_mt">Nilai MT:</label>
            <input type="text" id="nilai_mt" name="nilai_mt" required>

            <label for="no_absensi">No Absensi:</label>
            <input type="text" id="no_absensi" name="no_absensi" required>

            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengambil data dari form
            $nama = $_POST['nama'];
            $kelas = $_POST['kelas'];
            $nilai_tugas = $_POST['nilai_tugas'];
            $nilai_project = $_POST['nilai_project'];
            $nilai_mt = $_POST['nilai_mt'];
            $no_absensi = $_POST['no_absensi'];

            $finalScore = ($nilai_tugas * 0.30) + ($nilai_project * 0.50) + ($nilai_mt * 0.20);

            // Menampilkan data yang diinput
            echo '<div class="result">';
            echo "<h3>Data yang Anda Masukkan:</h3>";
            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>Kelas:</strong> $kelas</p>";
            echo "<p><strong>Nilai Tugas:</strong> $nilai_tugas</p>";
            echo "<p><strong>Nilai Project:</strong> $nilai_project</p>";
            echo "<p><strong>Nilai MT:</strong> $nilai_mt</p>";
            echo "<p><strong>No Absensi:</strong> $no_absensi</p>";
            echo '</div>';

            if ($finalScore >= 60 ) {
                echo "<p style='color: green;'>Selamat! Anda Lulus.</p>";
            } else {
                echo "<p style='color: red;'>Maaf, Anda Tidak Lulus.</p>";
            }

        }
        ?>
    </div>
</body>
</html>
