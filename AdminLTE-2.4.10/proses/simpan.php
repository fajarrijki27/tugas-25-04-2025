<?php 
include 'koneksi.php';
echo "<table border='1'>";
$nama_tamu = $_POST['nama'];
$alamat_tamu = $_POST['alamat'];
$notelp_tamu = $_POST['notelp'];
$pesan_tamu = $_POST['pesan'];


if (($nama_tamu!= "") && ($alamat_tamu!= "") && ($notelp_tamu!= "") && ($pesan_tamu!= "")) {
    $sql = "INSERT INTO buku_tamu (nama_tamu, alamat_tamu, notelp_tamu, pesan_tamu, tanggal_bertamu) 
        VALUES ('$nama_tamu', '$alamat_tamu', '$notelp_tamu', '$pesan_tamu', now())";
    
    $hasil = mysqli_query($connection, $sql);
    if ($hasil) {
        echo "<tr><td colspan=2>Data berhasil disimpan</td></tr>";
        echo "<tr><td>Nama</td><td>$nama_tamu</td></tr>";
        echo "<tr><td>Alamat</td><td>$alamat_tamu</td></tr>";
        echo "<tr><td>No Telepon</td><td>$notelp_tamu</td></tr>";
        echo "<tr><td>Pesan</td><td>$pesan_tamu</td></tr>";
        echo "<tr><td>Tanggal Bertamu</td><td>".date("Y-m-d H:i:s")."</td></tr>";
    } else {
        echo "<tr><td colspan=2>Data gagal disimpan disimpan</td></tr>";
    }    
}else {
    echo "<tr><td colspan=2>Data tidak boleh kosong</td></tr>";
}

?> 