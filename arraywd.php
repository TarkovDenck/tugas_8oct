<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa 3WD1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .card {
            border: 1px solid black;
            border-radius: 10px;
            padding: 15px;
            width: 220px;
            background-color: #f4f4f4;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            text-align: center;
            color: #4CAF50;
        }

        .card-content {
            font-size: 16px;
            text-align: center;
            color: #333;
        }

        .chart-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <?php
    echo "<h2>Daftar Siswa 3WD1</h2>";

    // Data siswa
    $siswa = array("Farras", "Javier", "Irza", "RB", "Fikhri");
    $id_siswa = array("1000", "1001", "1002", "1003", "1004");
    $gender = array("Male", "Male", "Male", "Male", "Female");

    // Hitung jumlah berdasarkan gender
    $male_count = 0;
    $female_count = 0;
    foreach ($gender as $g) {
        if ($g == "Male") {
            $male_count++;
        } elseif ($g == "Female") {
            $female_count++;
        }
    }
    ?>

    <!-- Tabel Siswa -->
    <table>
        <tr>
            <th>Nama</th>
            <th>ID Siswa</th>
            <th>Gender</th>
        </tr>
        <?php 
        for ($i = 0; $i < count($siswa); $i++) {
            echo "<tr>";
            echo "<td>" . $siswa[$i] . "</td>";
            echo "<td>" . $id_siswa[$i] . "</td>";
            echo "<td>" . $gender[$i] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Kartu Siswa -->
    <div class="card-container">
        <?php 
        for ($i = 0; $i < count($siswa); $i++) {
            echo "<div class='card'>";
            echo "<div class='card-title'>" . $siswa[$i] . "</div>";
            echo "<div class='card-content'>ID: " . $id_siswa[$i] . "</div>";
            echo "<div class='card-content'>Gender: " . $gender[$i] . "</div>";
            echo "</div>";
        }
        ?>
    </div>

    <!-- Chart Siswa berdasarkan Gender -->
    <div class="chart-container">
        <canvas id="genderChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    label: 'Siswa Berdasarkan Gender',
                    data: [<?php echo $male_count; ?>, <?php echo $female_count; ?>],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>

</body>
</html>
