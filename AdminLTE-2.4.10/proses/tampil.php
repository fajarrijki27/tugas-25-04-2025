<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan data buku tamu</title>
</head>
<body>
    <h1>FORM BUKU TAMU</h1>
    <h2>SMK IGASAR PINDAD</h2>    
        <hr>
        <br>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>No. Telp</td>
            <td>Pesan</td>
        </tr>

        <?php
            include 'koneksi.php';
            $no = 1;
            $sql = "SELECT * FROM buku_tamu ORDER BY tanggal_bertamu DESC";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['nama_tamu'] . "</td>";
                    echo "<td>" . $row['alamat_tamu'] . "</td>";
                    echo "<td>" . $row['notelp_tamu'] . "</td>";
                    echo "<td>" . $row['pesan_tamu'] . "</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
            }
            mysqli_close($connection);
        ?>
    </table>
</body>
</html>