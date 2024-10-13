<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Total Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="number"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .result {
            margin-top: 20px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .result p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Hitung Total Pembelian</h2>

        <form action="" method="post">
            <!-- Barang 1: Harga Tetap 5000 -->
            <label for="jumlah1">buah (Rp 5.000 per item):</label>
            <input type="number" id="jumlah1" name="jumlah1" required>

            <!-- Barang 2: Harga Tetap 100000 -->
            <label for="jumlah2">sayur (Rp 100.000 per item):</label>
            <input type="number" id="jumlah2" name="jumlah2" required>

            <!-- Barang 3: Harga Tetap 15000 -->
            <label for="jumlah3">gula (Rp 15.000 per item):</label>
            <input type="number" id="jumlah3" name="jumlah3" required>

            <label for="diskon">Diskon (%) :</label>
            <input type="number" id="diskon" name="diskon" required>

            <input type="submit" value="Hitung Total Pembelian">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Harga tetap untuk barang 1, 2, dan 3
            $harga_barang1 = 5000;
            $harga_barang2 = 100000;
            $harga_barang3 = 15000;

            // Ambil jumlah dari form
            $jumlah1 = $_POST['jumlah1'];
            $jumlah2 = $_POST['jumlah2'];
            $jumlah3 = $_POST['jumlah3'];
            $diskon = $_POST['diskon'];

            // Hitung total per barang
            $total1 = $harga_barang1 * $jumlah1;
            $total2 = $harga_barang2 * $jumlah2;
            $total3 = $harga_barang3 * $jumlah3;

            // Hitung total sebelum diskon
            $total_sebelum_diskon = $total1 + $total2 + $total3 ;

            // Hitung diskon
            $jumlah_diskon = ($diskon / 100) * $total_sebelum_diskon;

            // Hitung total setelah diskon
            $total_setelah_diskon = $total_sebelum_diskon - $jumlah_diskon;

            // Tampilkan hasil
            echo "<div class='result'>";
            echo "<h3>Hasil Perhitungan:</h3>";
            echo "<p>Total sebelum diskon: Rp " . number_format($total_sebelum_diskon, 2) . "</p>";
            echo "<p>Diskon: $diskon% (Rp " . number_format($jumlah_diskon, 2) . ")</p>";
            echo "<p>Total setelah diskon: Rp " . number_format($total_setelah_diskon, 2) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
