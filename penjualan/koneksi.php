<?php
// Sesuaikan dengan settingan database kamu
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ukk22"; // GANTI INI sesuai nama database di phpMyAdmin

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>