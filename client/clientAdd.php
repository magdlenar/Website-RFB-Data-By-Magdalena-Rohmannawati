<?php
// Menginclude file koneksi ke database
include '../tools/koneksirifan.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $kode = $_POST['kode'];
    $nomor = $_POST['nomor'];
    $nama = $_POST['nama'];
    $katagori = $_POST['katagori']; // Mengubah 'katagori' menjadi 'kategori'
    $ket = $_POST['ket'];
    $id_prov = $_POST['id_prov']; // Menambahkan id_prov

    // Mendapatkan ID terakhir dan menentukan ID berikutnya
    $query_last_code = $conn->query("SELECT MAX(id) AS last_code FROM database_nmr");
    $row = $query_last_code->fetch_assoc();
    $last_code = $row['last_code'];

    // Menentukan kode berikutnya
    if ($last_code === null) {
        $next_code = 1;
    } else {
        $next_code = intval($last_code) + 1;
    }
    $id = sprintf("%04d", $next_code);

    // Validasi input
    if (empty($kode) || empty($nomor) || empty($nama) || empty($katagori) || empty($ket) || empty($id_prov)) {
        die("Semua field harus diisi.");
    }

    // Mempersiapkan dan menjalankan query untuk menambahkan data ke tabel database_nmr
    $query = $conn->query("INSERT INTO database_nmr (id, kode, nomor, nama, katagori, ket, id_prov) 
                           VALUES ('$id', '$kode', '$nomor', '$nama', '$katagori', '$ket', '$id_prov')");

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
