<?php
$conn = mysqli_connect("localhost", "root", "dimas1000", "tiketbus");
function query($query) { 
    global $conn; 
    $result = mysqli_query($conn, $query); 
    if (!$result) {
        echo "Query Error: " . mysqli_error($conn);
        return [];
    }
    $rows = []; 
    while ($row = mysqli_fetch_assoc($result)) { 
        $rows[] = $row; 
    } 
    var_dump($rows); // Debugging
    return $rows; 
}



function ubah($data) {
    global $conn;
    $kdTiket = $data["kdTiket"];
    $penumpang = htmlspecialchars($data["penumpang"]);
    $noTlp = htmlspecialchars($data["noTlp"]);
    $nmBus = htmlspecialchars($data["nmBus"]);
    $noKursi = htmlspecialchars($data["noKursi"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $tujuan = htmlspecialchars($data["tujuan"]);
    $tglBerangkat = htmlspecialchars($data["tglBerangkat"]);
    $wktBerangkat = htmlspecialchars($data["wktBerangkat"]);
    $hrgTiket = htmlspecialchars($data["hrgTiket"]);

    // Hitung harga tiket
    $hrgTiket = harga_tiket($kelas, $tujuan);

    $query = "UPDATE tiket SET
              kdTiket = '$kdTiket',
              penumpang = '$penumpang',
              noTlp = '$noTlp'
              nmBus = '$nmBus',
              noKursi = '$noKursi',
              kelas = '$kelas',
              tujuan = '$tujuan',
              tglBerangkat = '$tglBerangkat',
              wktBerangkat = '$wktBerangkat',
              hrgTiket = '$hrgTiket'
              WHERE kdTiket = $kdTiket";

    mysqli_query($conn, $query);

    if (mysqli_errno($conn)) {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }

    return mysqli_affected_rows($conn);
}

function hapus($kdTiket) {
    global $conn;

    // Siapkan pernyataan SQL
    $stmt = $conn->prepare("DELETE FROM tiket WHERE kdTiket = ?");
    
    // Periksa apakah pernyataan berhasil dipersiapkan
    if ($stmt === false) {
        die("Persiapan pernyataan gagal: " . $conn->error);
    }

    // Ikat parameter
    $stmt->bind_param("s", $kdTiket);

    // Eksekusi pernyataan
    $stmt->execute();

    // Periksa apakah penghapusan berhasil
    $affected_rows = $stmt->affected_rows;

    // Tutup pernyataan
    $stmt->close();

    return $affected_rows;
}


function cari($keyword) {
    $query = "SELECT * FROM tiket WHERE id LIKE '%$keyword%' OR penumpang LIKE '%$keyword%'";
    return query($query);
}

function registrasi ($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string ($conn, $data ["password"]);
    $password2 = mysqli_real_escape_string ($conn, $data ["password2"]);
    $result =mysqli_query($conn, "SELECT username FROM registrasi WHERE username='$username' ");
    if (mysqli_fetch_assoc($result) ) {
    echo "
    <script> alert ('username sudah digunakan')
    </script>";
    return false;
    }
    //cek konfirmasi password
    if ($password !== $password2) {
    echo "
    <script>
    alert('pasword dan konfirmasi password tidak sama')
    </script>";
    return false;
    }
    //enkripsi password
    $password= password_hash($password, PASSWORD_DEFAULT);
    //insert data
    mysqli_query($conn, "INSERT INTO registrasi values( '', '$username', '$email', '$password' )");
    return mysqli_affected_rows ($conn);
    }
    
?>
