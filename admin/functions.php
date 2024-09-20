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
    // $kdTiket = htmlspecialchars($data["kdTiket"]);
    $penumpang = htmlspecialchars($data["penumpang"]);
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
    $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'user email already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image]);

         if($insert){
            if($image_size > 2000000){
               $message[] = 'image size is too large!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'registered successfully!';
               header('location:index.php');
            }
         }

      }
   }
    }
    
?>
