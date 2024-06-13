<?php
$servername = "localhost";
$username = "root";  // ganti dengan username database Anda
$password = "";      // ganti dengan password database Anda
$dbname = "toko_baju";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
