<?php
// Menginclude file koneksi ke database
include '../tools/koneksirifan.php';
// Mengambil nilai id alternatif dari parameter GET
$id = $_GET['id'];

// Menjalankan query untuk menghapus data alternatif berdasarkan id
$query = $conn->query("DELETE FROM users WHERE id='$id'");

// Memeriksa apakah query berhasil dijalankan
if ($query == True) {
    // Menampilkan alert bahwa data berhasil dihapus dan mengarahkan kembali ke halaman alternativeView.php
    echo "<script>
        alert('Data Deleted Successfully');
        window.location='add_user.php';
        </script>";
} else {
    // Menampilkan pesan error MySQL jika query tidak berhasil dijalankan
    die('MySQL error : ' . mysqli_errno($conn));
}
?>
