<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pemesanan Tiket</title>
    <script>
        function calculatePrice() {
            const kelas = document.getElementById('kelas').value;
            const noKursi = document.getElementById('noKursi').value;
            let price = 0;

            // Custom logic to calculate ticket price based on class and seat number
            if (kelas === 'eksekutif') {
                price = 300000; // Example pricing logic, adjust as needed
            } else if (kelas === 'bisnis') {
                price = 200000; // Example pricing logic, adjust as needed
            } else if (kelas === 'reguler') {
                price = 100000; // Example pricing logic, adjust as needed
            }

            // Additional logic based on seat number, if needed
            if (noKursi > 30 && noKursi <= 40) {
                price += 50000; // Example additional charge for specific seat range
            }

            document.getElementById('hrgTiket').value = price;
        }
    </script>

    <style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #222;
    margin: 0;
}

.form-container {
    background-color: #333;
    padding: 2em;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color: #d3d3d3;
    width: 100%;
    max-width: 500px;
    margin: auto;
}

.form-container img {
    display: block;
    margin: 1em auto;
    width: 80px;
    padding: 20px 0;
}

.form-container:hover {
    transform: scale(1.02);
    border: 1px solid #fff;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 1em;
    color: rgb(255, 255, 255);
    font-size: 1.2em;
}

.form-group {
    width: 100%;
    margin-bottom: 1em;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.form-group label {
    color: #d3d3d3;
    font-size: 0.9em;
}

.form-group input, .form-group select {
    width: 100%;
    background-color: #444;
    border: 1px solid #555;
    color: #d3d3d3;
    font-size: 0.9em;
    padding: 0.5em;
    margin-top: 0.5em;
}

.form-group input:focus, .form-group select:focus {
    background-color: #555;
    color: #fff;
}

.form-container .btn {
    width: 100%;
    padding: 0.5em;
    border-radius: 5px;
    margin-top: 1em;
    font-size: 0.9em;
}

.form-container .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.form-container .btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.form-container .btn a {
    color: #fff;
    text-decoration: none;
}

    </style>
    </style>
</head>
<body>

<div class="container">
    <?php
    if (isset($_GET['id'])) {
        $id_jadwal = $_GET['id'];
        
        // Connect to the database to fetch schedule details if needed
        $servername = "localhost";
        $username = "root";
        $password = "dimas1000";
        $dbname = "tiketbus";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the schedule details
        $sql = "SELECT nmBus, tujuan, tglBerangkat, wktBerangkat FROM jadwal WHERE id_jadwal = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_jadwal);
        $stmt->execute();
        $stmt->bind_result($nmBus, $tujuan, $tglBerangkat, $wktBerangkat);
        $stmt->fetch();
        $stmt->close();
        $conn->close();

        echo "<div class='form-container'>";
        echo "<img src='img/16.png' alt='icon'>";
        echo "<h2>Pemesanan Tiket untuk ID Jadwal: $id_jadwal</h2>";
        echo "<p>Bus: $nmBus</p>";
        echo "<p>Tujuan: $tujuan</p>";
        echo "<p>Tanggal Berangkat: $tglBerangkat</p>";
        echo "<p>Waktu Berangkat: $wktBerangkat</p>";
    ?>
    
    <form action="prosespesan.php" method="post">
        <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
        <input type="hidden" name="nmBus" value="<?php echo $nmBus; ?>">
        <input type="hidden" name="tujuan" value="<?php echo $tujuan; ?>">
        <input type="hidden" name="tglBerangkat" value="<?php echo $tglBerangkat; ?>">
        <input type="hidden" name="wktBerangkat" value="<?php echo $wktBerangkat; ?>">

        <div class="mb-3">
            <label for="penumpang" class="form-label">Nama</label>
            <input type="text" class="form-control" id="penumpang" name="penumpang" placeholder="Nama Lengkap" required>
        </div>

        <div class="mb-3">
            <label for="noTlp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="noTlp" name="noTlp" placeholder="No Telepon" required>
        </div>

        <div class="mb-3">
            <label for="noKursi" class="form-label">No Kursi</label>
            <input type="text" class="form-control" id="noKursi" name="noKursi" placeholder="No Kursi" required>
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select id="kelas" class="form-control" name="kelas" required onchange="calculatePrice()">
                <option value="eksekutif">Eksekutif</option>
                <option value="bisnis">Bisnis</option>
                <option value="reguler">Reguler</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="hrgTiket" class="form-label">Harga Tiket</label>
            <input type="text" class="form-control" id="hrgTiket" name="hrgTiket" placeholder="Harga Tiket" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Pesan Tiket</button>
        <button class="btn btn-secondary">
            <a href="jadwal.php">Back</a>
        </button>
    </form>
    </div>
    <?php
    } else {
        echo "<p>ID jadwal tidak disediakan!</p>";
    }
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+21P4+yEkHnv5DNeVhrTJuFUvG8An" crossorigin="anonymous"></script>
</body>
</html>
