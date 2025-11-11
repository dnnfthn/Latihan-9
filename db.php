<?php
$host = "localhost";
$user = "root";      // ganti jika perlu
$pass = "";          // ganti jika perlu
$db   = "upload_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
