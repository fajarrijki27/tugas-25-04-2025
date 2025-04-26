<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tamu = $_POST['nama'] ?? '';
    $alamat_tamu = $_POST['alamat'] ?? '';
    $notelp_tamu = $_POST['notelp'] ?? '';
    $pesan_tamu = $_POST['pesan'] ?? '';

    if (!empty($nama_tamu) && !empty($alamat_tamu) && !empty($notelp_tamu) && !empty($pesan_tamu)) {
        $sql = "INSERT INTO buku_tamu (nama_tamu, alamat_tamu, notelp_tamu, pesan_tamu, tanggal_bertamu) 
                VALUES ('$nama_tamu', '$alamat_tamu', '$notelp_tamu', '$pesan_tamu', NOW())";

        if (mysqli_query($connection, $sql)) {
            // Berhasil insert
            echo "
            <html>
            <head>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'Data berhasil disimpan!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '../tampildatabt.php';
                        }
                    });
                </script>
            </body>
            </html>
            ";
        } else {
            // Gagal insert
            echo "
            <html>
            <head>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Data gagal disimpan.',
                        icon: 'error',
                        confirmButtonText: 'Coba Lagi'
                    }).then((result) => {
                        window.history.back();
                    });
                </script>
            </body>
            </html>
            ";
        }
    } else {
        // Form kosong
        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Oops!',
                    text: 'Data tidak boleh kosong!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    window.history.back();
                });
            </script>
        </body>
        </html>
        ";
    }
} else {
    // Kalau bukan method POST
    echo "Akses tidak sah!";
}
?>
