<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection details
    $servername = "localhost";
    $username = "root";
    $password = "dimas1000";
    $dbname = "tiketbus";

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate Kode Tiket
    $kdTiket = generateKodeTiket($conn);

    // Sanitize input data
    $penumpang = htmlspecialchars($_POST["penumpang"]);
    $noTlp = htmlspecialchars($_POST["noTlp"]);
    $nmBus = htmlspecialchars($_POST["nmBus"]);
    $noKursi = htmlspecialchars($_POST["noKursi"]);
    $kelas = htmlspecialchars($_POST["kelas"]);
    $tujuan = htmlspecialchars($_POST["tujuan"]);
    $tglBerangkat = htmlspecialchars($_POST["tglBerangkat"]);
    $wktBerangkat = htmlspecialchars($_POST["wktBerangkat"]);

    // Calculate ticket price
    $hrgTiket = harga_tiket($kelas, $tujuan);

    // Insert booking data into the 'tiket' table
    $sql = "INSERT INTO tiket (kdTiket, penumpang, noTlp, nmBus, noKursi, kelas, tujuan, tglBerangkat, wktBerangkat, hrgTiket) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if prepare was successful
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssissssss", $kdTiket, $penumpang, $noTlp, $nmBus, $noKursi, $kelas, $tujuan, $tglBerangkat, $wktBerangkat, $hrgTiket);

    if ($stmt->execute()) {
        // Pemesanan berhasil, cetak tiket
        cetak_tiket($kdTiket, $penumpang, $noTlp, $nmBus, $noKursi, $kelas, $tujuan, $tglBerangkat, $wktBerangkat, $hrgTiket);
        
        // Insert booking data into the 'admin_tiket' table
        insertAdminRecord($conn, $kdTiket, $penumpang, $noTlp, $nmBus, $noKursi, $kelas, $tujuan, $tglBerangkat, $wktBerangkat, $hrgTiket);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method!";
}

function insertAdminRecord($conn, $kdTiket, $penumpang, $noTlp, $nmBus, $noKursi, $kelas, $tujuan, $tglBerangkat, $wktBerangkat, $hrgTiket) {
    // Prepare and bind
    $sql = "INSERT INTO admin_tiket (kdTiket, penumpang, noTlp, nmBus, noKursi, kelas, tujuan, tglBerangkat, wktBerangkat, hrgTiket) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if prepare was successful
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssissssss", $kdTiket, $penumpang, $noTlp, $nmBus, $noKursi, $kelas, $tujuan, $tglBerangkat, $wktBerangkat, $hrgTiket);

    if ($stmt->execute()) {
        echo "Data juga berhasil dimasukkan ke admin.";
    } else {
        echo "Error inserting admin record: " . $stmt->error;
    }

    $stmt->close();
}

function generateKodeTiket($conn) {
    // Generate unique ticket code
    $kdTiket = 'TIK' . time(); // Example: TIK1625647382

    // Check if the code already exists
    $sql = "SELECT kdTiket FROM tiket WHERE kdTiket = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $kdTiket);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // If the code already exists, generate a new one
        $stmt->close();
        return generateKodeTiket($conn);
    }

    $stmt->close();
    return $kdTiket;
}

function harga_tiket($kelas, $tujuan) {
    $base_price = 100000; // Example base price

    $kelas_factor = [
        'eksekutif' => 1.5,
        'bisnis' => 1.2,
        'reguler' => 1.0,
    ];

    $tujuan_factor = [
        'MEDAN-PADANG' => 1.2,
        'MEDAN-BERASTAGI' => 1.3,
        'MEDAN-ACEH' => 2.0,
        'MEDAN-SIANTAR' => 2.0,
        'MEDAN-BATAM' => 2.0,
        'MEDAN-SAMOSIR' => 2.0,
        'MEDAN-KALIMANTAN' => 2.0,
        'MEDAN-RIAU' => 2.0,
    ];

    $kelas_factor_value = $kelas_factor[$kelas] ?? 1.0;
    $tujuan_factor_value = $tujuan_factor[$tujuan] ?? 1.0;

    return $base_price * $kelas_factor_value * $tujuan_factor_value;
}

function cetak_tiket($kdTiket, $penumpang, $noTlp, $nmBus, $noKursi, $kelas, $tujuan, $tglBerangkat, $wktBerangkat, $hrgTiket) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta charset="UTF-8">
        <title>Cetak Tiket</title>
        <style>

        body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #222;
        margin: 0;
}   

        .card{
        padding: 2em;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        color: #d3d3d3;
        width: 100%;
        max-width: 500px;
}

    .card-body{
        width: 90%;
        height: 70%;
}

        .card img{
        display: block;
        margin: 1em auto;
        width: 200px;
        padding: 20px 0;
}

        .card h5{
        margin-bottom: 0.5em;
        color: black;
        font-size: 1.2em;
}
  .card ul li{
    font-size: 15px;
    font-style: bold;
    color: black;
}
        
    .card-body a{
     text-decoration: none;
    color: black);
    font-weight: bold;
}
    

    .card-body .card-link{
     padding: 10px 20px 10px 20px;
    background-color: aqua;
    border: none;
    color: black;
    cursor: pointer;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
}

.card-body .card-link:hover{
    background-color: #0909d0;
    transition: all .3s ease;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
}




        </style>
    </head>
    <body>
        <div class="card">
            <img src="img/16.png" class="card-img-top" alt="startransport">
            <div class="card-body">
                <h5 class="card-title">Tiket Bus</h5>
                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                 </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Kode Tiket: ' . htmlspecialchars($kdTiket) . '</li>
                    <li class="list-group-item">Nama Penumpang: ' . htmlspecialchars($penumpang) . '</li>
                    <li class="list-group-item">No Telepon: ' . htmlspecialchars($noTlp) . '</li>
                    <li class="list-group-item">Nama Bus: ' . htmlspecialchars($nmBus) . '</li>
                    <li class="list-group-item">No Kursi: ' . htmlspecialchars($noKursi) . '</li>
                    <li class="list-group-item">Kelas: ' . htmlspecialchars($kelas) . '</li>
                    <li class="list-group-item">Tujuan: ' . htmlspecialchars($tujuan) . '</li>
                    <li class="list-group-item">Tanggal Berangkat: ' . htmlspecialchars($tglBerangkat) . '</li>
                    <li class="list-group-item">Waktu Berangkat: ' . htmlspecialchars($wktBerangkat) . '</li>
                    <li class="list-group-item">Harga Tiket: ' . htmlspecialchars($hrgTiket) . '</li>
                </ul>
                <div class="card-body">
                    <a href="prosespesan.php" class="card-link">Cetak</a>
                    <a href="index.php" class="card-link">Kembali</a>
                
            </div>
        </div>
        <script>
            window.onload = function() {
                window.print();
            }
        </script>
    </body>
    </html>';
    exit; // Pastikan halaman berhenti di sini setelah mencetak tiket
}
?>
