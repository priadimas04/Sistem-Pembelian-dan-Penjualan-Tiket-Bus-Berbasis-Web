<?php
require 'functions.php';

if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
        alert('Anda Berhasil Login');
        document.location.href = 'index.php';
        </script>";
    } else {
        $error = mysqli_error($conn);
        echo "
        <script>
        alert('Login Gagal: $error');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    
<link rel="stylesheet" href="stylu.css">
    <title>Halaman Registrasi</title>
    
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
        <div>
            <label for="username">Username:</label> <br>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label> <br>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password2">Confirmation Password:</label> <br>
            <input type="password" name="password2" id="password2" required> <br>
        </div>
        <div>
            <button type="submit" name="registrasi">Register</button>
        </div>
    </form>
</body>
</html>
