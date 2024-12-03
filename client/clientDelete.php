<?php
// Menginclude file koneksi ke database
include '../tools/koneksirifan.php';

// Mengambil nilai id alternatif dari parameter GET
$id = $_GET['id'];
$kode = $_GET['kode']; // Ambil kode dari GET

// Menjalankan query untuk menghapus data alternatif berdasarkan id
$query = $conn->query("DELETE FROM database_nmr WHERE id='$id'");

// Memeriksa apakah query berhasil dijalankan
if ($query) {
    header("Location: clientView.php?id=" . urlencode($kode));
    exit();
} else {
    die('MySQL error: ' . mysqli_error($conn));
} 
?>
