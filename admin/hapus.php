<?php
require 'functions.php';

if (isset($_GET['kdTiket'])) {
    $kdTiket = $_GET['kdTiket'];

    if (hapus($kdTiket) > 0) {
        echo "
        <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal dihapus');
        document.location.href = 'index.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
    alert('Kode tiket tidak ditemukan');
    document.location.href = 'index.php';
    </script>
    ";
}
?>
