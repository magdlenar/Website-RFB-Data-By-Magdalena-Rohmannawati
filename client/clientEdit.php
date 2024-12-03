<?php
// Menginclude file koneksi ke database
include '../tools/koneksirifan.php';

// Memeriksa apakah tombol 'update' telah diklik
if (isset($_POST['update'])) {
    // Mengambil nilai dari inputan yang dikirimkan melalui POST
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nomor = $_POST['nomor'];
    $nama = $_POST['nama'];
    $kategori = $_POST['katagori']; // Pastikan kolom ini bernama 'katagori' dalam database
    $ket = $_POST['ket'];
    $id_prov = $_POST['id_prov']; // Menambahkan input provinsi yang diterima dari form

    // Menjalankan query MySQL untuk melakukan update data di tabel database_nmr berdasarkan id
    $query = $conn->query("UPDATE database_nmr SET kode='$kode', nomor='$nomor', nama='$nama', katagori='$kategori', ket='$ket', id_prov='$id_prov' WHERE id='$id'");

    // Memeriksa apakah query berhasil dijalankan
    if ($query) {
        header("Location: clientView.php?id=" . $kode);
        exit();
    } else {
        die('MySQL error : ' . mysqli_error($conn));
    }
} else {
    echo "Form not submitted.";
}
?>
