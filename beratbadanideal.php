<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Berat Badan Ideal</title>
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
        input[type="number"],
        select {
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
        <h2>Form Hitung Berat Badan Ideal</h2>
        
        <!-- Form untuk input data -->
        <form action="" method="post">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>

            <label for="tinggi">Tinggi Badan (cm):</label>
            <input type="number" id="tinggi" name="tinggi" required>

            <label for="berat_badan">Berat Badan Kamu (kg):</label>
            <input type="number" id="berat_badan" name="berat_badan" required>

            <input type="submit" value="Hitung dan Bandingkan">
        </form>

        <?php
        // Fungsi untuk menghitung berat badan ideal
        function hitungBeratBadanIdeal($nama, $gender, $tinggi) {
            if ($gender == 'Pria') {
                $berat_ideal = ($tinggi - 100) - (($tinggi - 100) * 0.10);
            } else if ($gender == 'Wanita') {
                $berat_ideal = ($tinggi - 100) - (($tinggi - 100) * 0.15);
            } else {
                return "Gender tidak valid.";
            }

            return $berat_ideal;
        }

       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $gender = $_POST['gender'];
            $tinggi = $_POST['tinggi'];
            $berat_badan = $_POST['berat_badan'];

            // Validasi input
            if (!empty($nama) && !empty($gender) && !empty($tinggi) && !empty($berat_badan)) {
                $berat_ideal = hitungBeratBadanIdeal($nama, $gender, $tinggi);
                echo '<div class="result">';
                echo "<h3>Hasil Perhitungan:</h3>";
                echo "<p>Hai <strong>$nama</strong>, berat badan ideal kamu dengan tinggi <strong>$tinggi cm</strong> sebagai <strong>$gender</strong> adalah sekitar <strong>" . round($berat_ideal, 2) . " kg</strong>.</p>";

                // Bandingkan dengan berat badan yang dimasukkan
                if ($berat_badan < $berat_ideal) {
                    echo "<p>Berat badan kamu adalah <strong>$berat_badan kg</strong>, yang berarti kamu <strong>di bawah</strong> berat badan ideal.</p>";
                } elseif ($berat_badan > $berat_ideal) {
                    echo "<p>Berat badan kamu adalah <strong>$berat_badan kg</strong>, yang berarti kamu <strong>di atas</strong> berat badan ideal.</p>";
                } else {
                    echo "<p>Selamat! Berat badan kamu <strong>sudah ideal</strong>, yaitu <strong>$berat_badan kg</strong>.</p>";
                }
                echo '</div>';
            } else {
                echo "<p>Semua data harus diisi!</p>";
            }
        }
        ?>
    </div>
</body>
</html>
