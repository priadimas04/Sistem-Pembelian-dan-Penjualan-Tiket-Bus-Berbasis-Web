<?php
session_start();
require "functions.php";
$conn = mysqli_connect("localhost","root","","pesantiket");
if (isset($_POST['submit'])) {
 $username = htmlspecialchars($_POST['username']) ;
    $password = $_POST['password'];  
    // query insert data
  $query = "INSERT INTO user VALUES (
  '','$username','$password') ";
  mysqli_query($conn, $query);
    // cek apakah data berhasil ditambahkan atau tidak
    if (mysqli_affected_rows($conn) > 0) {
     echo "
<script>
alert (login berhasil);
document.location.href.starbus.php;
</script>
        ";
    }else{
        echo "
<script>
alert (tidak dapat login);
document.location.href.starbus.php;
</script>
        ";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   


     <!-- Fav Icon -->
     <link rel="shortcut icon" href="img/16.png" type="img/x-icon">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="stylu.css">
    <title>selamat datang </title>
</head>
<body>
   
<form  class="oke"   action="starbus.php" method="post">
<h4>silahkan login akun anda </h4>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text" required>masukkan alamat email anda </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" required>
  </div>
 
  <button type="submit" class="btn btn-primary">login</button>
</form>


<!-- footer  -->
    <!-- footer section design -->
    <footer class="footer">
        <div class="footer-text">
            <p>copyright & 2024; by  | kelompok starboy</p>
        </div>
<div class="footer-icon-top">
    <a href="#logo"><i  data-feather="chevron-up" ></i></a>
</div>
    </footer>

</body>
</html>