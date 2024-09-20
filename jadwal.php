<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="style/jalan.css">
    <title>Jadwal Bus Mingguan</title>
</head>

<body>

    <section class="header">
        <div class="container">
            <div class="navbar-container">
                <div class="navbar">
                    <div class="logo">
                        <i class="fa-solid fa-bus"></i>
                    </div>
                    <ul class="menu">
                        <li><a href="#hero"><i class="fa-solid fa-home"></i> Home</a></li>
                        <li><a href="#bus"><i class="fa-solid fa-star"></i> Best Bus</a></li>
                        <li><a href="#services"><i class="fa-solid fa-list"></i> Service</a></li>
                        <li><a href="#gallery"><i class="fa-solid fa-image"></i> Gallery</a></li>
                        <li><a href="#contact"><i class="fa-solid fa-phone"></i> Contact</a></li>
                    </ul>

                    <button class="about-button">
                        <a href="tiket.php">Account</a>
                    </button>
                    <button class="hamburger hamburger--spin" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div>
                <h2>Jadwal Bis Mingguan</h2>
            </div>

            <h4>Jadwal Bus</h4>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Jadwal</th>
                        <th scope="col">Nama Bus</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Tanggal Berangkat</th>
                        <th scope="col">Waktu Berangkat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    // Konfigurasi database
                    $servername = "localhost";
                    $username = "root";
                    $password = "dimas1000";
                    $dbname = "tiketbus";

                    // Membuat koneksi
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Memeriksa koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk mengambil data dari tabel jadwal
                    $sql = "SELECT id_jadwal, nmBus, jKursi, tujuan, tglBerangkat, wktBerangkat FROM jadwal";
                    $result = $conn->query($sql);

                    // Memeriksa apakah ada hasil yang ditemukan
                    if ($result->num_rows > 0) {
                        // Menampilkan data untuk setiap baris
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["id_jadwal"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["nmBus"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["jKursi"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["tujuan"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["tglBerangkat"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["wktBerangkat"]) . "</td>";
                            echo "<td><a href='tiket.php?id=" . htmlspecialchars($row["id_jadwal"]) . "'><button class='btn btn-primary'>Pesan</button></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Tidak ada jadwal ditemukan</td></tr>";
                    }

                    // Menutup koneksi
                    $conn->close();
                    ?>
                </tbody>
            </table>
            
            <div class="row">
                <div class="col-md col-sm-3 mt-4 text-right">
                    <p><button type="button" class="btn btn-info" onclick="location.href='index.php'">&lt; Kembali ke beranda</button></p>
                </div>
            </div>
        </div>

    </section>

    <script>
        feather.replace()
    </script>
</body>

</html>
