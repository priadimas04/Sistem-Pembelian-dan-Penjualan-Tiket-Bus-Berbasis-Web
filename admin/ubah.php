<?php
require 'functions.php';

// Ambil data di URL
$kdTiket = $_GET["kdTiket"];

// Query data berdasarkan kdTiket
$pen = query("SELECT * FROM tiket WHERE kdTiket = $kdTiket")[0];

// Periksa apakah form telah disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $kdTiket = $_POST['kdTiket'];
    // echo $kdTiket; // Anda bisa menggunakan echo untuk debugging

    // Update data tiket di database
    $updateQuery = "UPDATE tiket SET /* kolom1 = 'value1', kolom2 = 'value2', ... */ WHERE kdTiket = $kdTiket";
    // Sesuaikan kolom yang ingin Anda update

    if (executeQuery($updateQuery)) { // Pastikan Anda memiliki fungsi executeQuery untuk menjalankan query
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah!');
        document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>
<head>

<!-- Fav Icon -->
<link rel="shortcut icon" href="img/16.png" type="img/x-icon">

	<link rel="stylesheet" href="stala.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="styli.css">
<title>Ubah data mahasiswa</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#logo">Star Transport</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="kiri">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#menu">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#tentang">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#pusat">Pusat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#contact">Contact</a>
        </li>

      
      </ul>
    </div>
    </div>
  </div>
</nav>
<hr>
<form action="" method="post">
    <table>
        <input type="hidden" name="kdTiket" value="<?= $pen["kdTiket"]; ?>">
        <tr>
            <td>Kode Tiket</td>
            <td> : </td>
            <td><input type="text" name="kdTiket" value="<?= $pen["kdTiket"]; ?>"></td>
        </tr>
        <tr>
            <td>Nama Penumpang</td>
            <td> : </td>
            <td><input type="text" name="penumpang" value="<?= $pen["penumpang"]; ?>"></td>
        </tr>

        <tr>

        <tr>
            <td>No Telepon</td>
            <td> : </td>
            <td><input type="text" name="noTlp" value="<?= $pen["noTlp"]; ?>"></td>
        </tr>
              <td>Nama Bus</td>
              <td>:</td>
                <td>
                    <select name="nmBus">
                        <option value="starbus">Starbus</option>
                        <option value="skenabus">Skenabus</option>
                        <option value="stussybus">Stussybus</option>
                    </select>
                </td>
            </tr>
        <tr>
            <td>No Kursi</td>
            <td> : </td>
            <td><input type="text" name="noKursi" value="<?= $pen["noKursi"]; ?>"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td> : </td>
            <td><input type="text" name="kelas" value="<?= $pen["kelas"]; ?>"></td>
        </tr>
        <tr>
            <td>Tujuan</td>
            <td> : </td>
            <td><input type="text" name="tujuan" value="<?= $pen["tujuan"]; ?>"></td>
        </tr>
        <tr>
            <td>Tanggal Berangkat</td>
            <td> : </td>
            <td><input type="date" name="tglBerangkat" value="<?= $pen["tglBerangkat"]; ?>"></td>
        </tr>
        <tr>
            <td>Waktu Berangkat</td>
            <td> : </td>
            <td><input type="time" name="wktBerangkat" value="<?= $pen["wktBerangkat"]; ?>"></td>
        </tr>
        <tr>
            <td>Harga Tiket</td>
            <td> : </td>
            <td><input type="text" name="hrgTiket" value="<?= $pen["hrgTiket"]; ?>"></td>
        </tr>
        <tr>
            <td colspan="3"><button type="submit" name="submit" value="ubah">Simpan Perubahan Data</button></td>
        </tr>
        <tr>
            <td colspan="3">&copy; 2024 | Kelompok Starboy</td>
        </tr>
    </table>
</form>

</body>
</html>