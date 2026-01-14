<?php
include 'koneksi.php';

// Mengambil id dan memastikan tidak kosong
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Jalankan query DELETE 
    // CATATAN: Jika nama kolom di tabelmu 'id_produk', ubah 'id' menjadi 'id_produk'
    $query = "DELETE FROM produk WHERE id_produk='$id' ";
    $hasil_query = mysqli_query($koneksi, $query);

    // Periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }
} else {
    // Jika mencoba akses langsung file ini tanpa ID
    echo "<script>alert('ID tidak ditemukan!');window.location='index.php';</script>";
}
?>