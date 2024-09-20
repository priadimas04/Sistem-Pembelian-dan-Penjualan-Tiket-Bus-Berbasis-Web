<?php
require 'functions.php';

if (isset($_POST["registrasi"])) {  
    $result = registrasi($_POST);
    if ($result > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert('Error: Data tidak berhasil ditambah');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="shortcut icon" href="img/16.png" type="img/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
        }
        .container img {
            width: 100px;
            display: block;
            margin: 0 auto;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }
        .container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
        }
        .container input[type="text"],
        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container button {
            width: auto;
            padding: 10px 20px;
            background-color: #00f9ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
            margin-right: 10px;
        }
        .container button:last-child {
            background-color: #f44336;
            margin-right: 0;
        }
        .container button:hover {
            background-color: black;
            transition: all .3s ease;
        }
        .container button:last-child:hover {
            background-color: #e53935;
        }
        .container .login-link {
            text-align: center;
            margin-top: 10px;
            color: white;
        }
        .container .login-link a {
            color: white;
            text-decoration: none;
        }
        .container .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
        <img src="img/16.png" alt="icon">
        <h2>Registrasi Akun</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <label for="password2">Konfirmasi Password</label>
            <input type="password" id="password2" name="password2" required>

          
            
            <button type="submit" name="registrasi">Daftar</button>
            <button type="button" onclick="window.location.href='index.php'">Batal</button>
        </form>
        <div class="login-link">
            Sudah punya akun? <a href="login.php">Masuk di sini</a>
        </div>
    </div>
</body>
</html>
        