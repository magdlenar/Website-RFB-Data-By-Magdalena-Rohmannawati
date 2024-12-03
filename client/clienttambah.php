<?php
// Menginclude file koneksi ke database
include '../tools/koneksirifan.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $namagroup = $_POST['namagroup'];

    // Mendapatkan ID terakhir dan menentukan ID berikutnya
    $query_last_code = $conn->query("SELECT MAX(id) AS last_code FROM tagroup");
    $row = $query_last_code->fetch_assoc();
    $last_code = $row['last_code'];

    // Menentukan kode berikutnya
    if ($last_code === null) {
        $next_code = 1;
    } else {
        $next_code = intval($last_code) + 1;
    }
    // Format kode dengan leading zero
    $id = sprintf("%04d", $next_code);

    // Validasi input
    if (empty($namagroup)) {
        die("Nama group harus diisi.");
    }

    // Mempersiapkan dan menjalankan query untuk menambahkan data ke tabel tagroup
    $query = $conn->query("INSERT INTO tagroup (id, namagroup) VALUES ('$id', '$namagroup')");

    // Memeriksa apakah query berhasil dijalankan
    if ($query) {
        // Redirect dengan JavaScript ke URL yang diinginkan
        echo "<script>
                alert('Data Saved Successfully');
                window.location.href = '../client/clientisi.php?id=$id';
              </script>";
    } else {
        // Menampilkan pesan error MySQL
        die('MySQL error : ' . mysqli_error($conn));
    }
} else {
    echo "Form not submitted.";
}
?>
