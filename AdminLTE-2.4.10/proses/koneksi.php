<?php 
// koneksi.php
$host = "localhost";
$username = "root";
$pw = "";
$db = "bukutamu";

$connection = mysqli_connect('localhost', 'root', '', 'bukutamu', 3311);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>