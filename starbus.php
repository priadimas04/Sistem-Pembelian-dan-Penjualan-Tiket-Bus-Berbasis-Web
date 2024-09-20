
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stala.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<!-- icons -->
<script src="https://unpkg.com/feather-icons"></script>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<link rel="stylesheet" type="text/css" href="img/style.css">
    <title>Starbus | Beranda</title>

</head>
<body>
<!-- navigasi -->

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

<!-- Bagian menu -->
<style>

  img {
    height: 50px;
    width: 50px;
  }

  img:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
  }


  .atas {
    padding-top: 65px;
    text-align:center;
    padding-bottom: 5px;
  }

  </style>

<div id="menu" class="menu">
<div class="atas">
    <center>
      <img src="img/15.png" class="img-fluid" style="width: 25%; transform: none;">
    </center>
  </div>
    <div class="container">
    <div class="row">
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="tambah.php">
    <img src="img/book.png" class="img-fluid" alt="Responsive image" onclick="location.href='jadwal.php';">
    </a>
    <p><h5>Pesan Tiket</h5>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="tiket.php">
    <img src="img/bus.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h5>Lihat Tiket</h5>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="batalkantiket.php">
    <img src="img/cancel.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h5>Batalkan Tiket</h5>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="jadwal.php">
    <img src="img/jadwal.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h5>Jadwal Bis <br>Mingguan</h5>
    </div>
    <div class="row">
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="profil.php">
    <img src="img/profile.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h5>Profil</h5>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="">
    <img src="img/term.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h5>Terms & Condition</h5>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="">
    <img src="img/pengumuman.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h5>Pengumuman</h5>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="keluar.php">
    <img src="img/logout.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h5>Log Out</h5>
    </div>
</div>
  </div>
</div>


<!-- BAGIAN HOME  -->
<div id="home" class="container">
  <div class="row">
    <div class="col">
      <h3>star <span>transport</span></h3>
      <h6>mengantar dengan selamat dan juga cepat</h6>
      <p>"Naiklah bersama kami, dan biarkan kami membawa Anda ke destinasi impian Anda dengan kenyamanan dan keamanan yang tak tertandingi."</p>
      <div class="icons">
      <i class="logo" data-feather="facebook"></i>
      <p>star transport</p>
      </div>
      <div class="icons">
      <i class="logo" data-feather="youtube"></i>
      <p>star transport</p>
      </div>
      <div class="icons">
      <i class="logo" data-feather="instagram"></i>
      <p>star transport</p>
      </div>
      <details>hoopp,,masuk dia</details>
    </div>
    
    <div class="col">
    <img src="img/2.png" alt="star bus ">
    </div>
   
  </div>
</div>
  
<!-- bagian tentang  -->
<div id="tentang"    class="container">
  <div class="row">
    <div class="col">
     <img src="img/01.jpg" alt="mmm">
    </div>
    <div class="col">
     <h2>tentang <span>kami</span></h2>
     <h4>jelajahi dunia bersama kami</h4>
     <p>"Melampaui batas dengan keunggulan operasional dan pelayanan pelanggan yang superior, kami adalah pilihan utama untuk kebutuhan ekspedisi bus Anda."</p>

    </div>
   
  </div>
</div>

<!-- bagian pusat -->
<div id="pusat" class="pusat">
    <!-- card pertama -->
    <h4>pusat <span>kami</span></h4>
    <p> "Menembus batas dengan kecepatan dan keandalan, kami adalah pilihan utama Anda <br>dalam perjalanan ekspedisi bus."</p>
    <div class="flex">
        <div class="olo">
            <!-- card1 -->
              <div class="card" >
  <img src="img/dimas.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">pria dimas</h5>
    <p class="card-text"><h6>Data Analyst/Scientist.</h6></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
        </div>
        <!-- card 2 -->
        <div class="olo">
    
              <div class="card" >
  <img src="img/wana.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">wanaman lase</h5>
    <p class="card-text"><h6>Web Developer.</h6></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </div>
    <!-- card 3 -->
    <div class="olo">
    
    <div class="card" >
<img src="img/dans.jpg" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">daniel sihombing</h5>
<p class="card-text"><h6>Fullstack Developer.</h6></p>
<a href="#" class="btn btn-primary">Go somewhere</a>
</div>
</div>
</div>
<!-- card 4 -->
<div class="olo">
    
    <div class="card">
<img src="img/putra.jfif" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">Putra Tarigan</h5>
<p class="card-text"><h6>Software Developer.</h6></p>
<a href="#" class="btn btn-primary">Go somewhere</a>
</div>
</div>
</div>
</div>

<!-- bagian contack  -->
<div class="contact" id="contact">
<div class="container">
  <div class="row">
    <div class="col">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127424.94079175622!2d98.5161161433594!3d3.580720200000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131d545fb8b67%3A0x92a59ca0abe53796!2sOffice%20STMIK%20Pelita%20Nusantara!5e0!3m2!1sen!2sid!4v1706408424341!5m2!1sen!2sid" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col">
    <h4>contack <span>kami</span></h4> 
    <p>silahkan dm sesuai dengan akun <br>
yang dibawah ini</p>
    <div class="icons">
      <i class="logo" data-feather="mail"></i>
      <p>priadimas64@gmail.com</p>
      
    </div>
    <hr class="garis">
    <div class="icons">
      <i class="logo" data-feather="mail"></i>
      <p>danieldioladossihombing@gmail.com</p>
    </div>
    <hr class="garis">
    <div class="icons">
      <i class="logo" data-feather="mail"></i>
      <p>wanalase0@gmail.com</p>
    </div>
    <hr class="garis">
    <div class="icons">
      <i class="logo" data-feather="mail"></i>
      <p>msyahputraalamsyahtrg@gmail.com</p>
    </div>
  </div>
</div>
</div>

<!-- footer -->
    <!-- footer section design -->
    <footer class="footer">
        <div class="footer-text">
            <p>copyright & 2024; by  | kelompok starboy</p>
        </div>
<div class="footer-icon-top">
   <a href="#logo"></a>
</div>
    </footer>
</body>

<script>
      feather.replace();
    </script>
</html>