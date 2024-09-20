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
    return $rows; 
}

// Fetch data from the database with filtering
$ticketData = query("SELECT * FROM tiket WHERE penumpang != ''");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tiket</title>
</head>
<body>
    <h1>Daftar Tiket</h1>

    <form method="post" action="">
        <input type="text" name="keyword" placeholder="Cari penumpang...">
        <button type="submit" name="search">Cari</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Tiket</th>
                <th>Nama Penumpang</th>
                <th>No Telepon</th>
                <th>Nama Bus</th>
                <th>No Kursi</th>
                <th>Kelas</th>
                <th>Tujuan</th>
                <th>Tanggal Berangkat</th>
                <th>Waktu Berangkat</th>
                <th>Harga Tiket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($ticketData as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row["kdTiket"]); ?></td>
                    <td><?= htmlspecialchars($row["penumpang"]); ?></td>
                    <td><?= htmlspecialchars($row["noTlp"]); ?></td>
                    <td><?= htmlspecialchars($row["nmBus"]); ?></td>
                    <td><?= htmlspecialchars($row["noKursi"]); ?></td>
                    <td><?= htmlspecialchars($row["kelas"]); ?></td>
                    <td><?= htmlspecialchars($row["tujuan"]); ?></td>
                    <td><?= htmlspecialchars($row["tglBerangkat"]); ?></td>
                    <td><?= htmlspecialchars($row["wktBerangkat"]); ?></td>
                    <td><?= htmlspecialchars($row["hrgTiket"]); ?></td>
                    <td>
                        <a href="edit.php?kdTiket=<?= $row['kdTiket']; ?>">Edit</a> ||
                        <a href="hapus.php?kdTiket=<?= $row['kdTiket']; ?>" onclick="return confirm('Apakah Anda yakin?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
