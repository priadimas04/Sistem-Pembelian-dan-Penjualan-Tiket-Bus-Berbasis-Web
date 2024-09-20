<?php
require 'functions.php';

if (isset($_GET['kelas']) && isset($_GET['tujuan'])) {
    $kelas = $_GET['kelas'];
    $tujuan = $_GET['tujuan'];
    $harga = harga_tiket($kelas, $tujuan);
    
    echo json_encode(['harga' => $harga]);
}
?>
