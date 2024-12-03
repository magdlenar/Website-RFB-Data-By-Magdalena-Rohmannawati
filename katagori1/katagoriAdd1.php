<?php
include '../tools/koneksirifan.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];  // ID diambil dari form
    $kode = $_POST['kode'];
    $nomor = $_POST['nomor']; 
    $nama = $_POST['nama'];
    $kategori = $_POST['katagori']; 
    $ket = $_POST['ket'];
    $id_prov = $_POST['id_prov'];

    // Ambil kode terakhir untuk ID yang baru
    $query_last_code = $conn->query("SELECT MAX(id) AS last_code FROM database_nmr");
    $row = $query_last_code->fetch_assoc();
    $last_code = $row['last_code'];

    // Tentukan kode berikutnya
    if ($last_code === null) {
        $next_code = 1;
    } else {
        $next_code = intval($last_code) + 1;
    }

    // Format ID dengan 4 digit
    $id = sprintf("%04d", $next_code); 

    // Validasi form
    if (empty($kode) || empty($nomor) || empty($nama) || empty($kategori) || empty($ket) || empty($id_prov)) {
        die("Semua field harus diisi.");
    }

    // Query untuk menyimpan data ke database
    $query = $conn->query("INSERT INTO database_nmr (id, kode, nomor, nama, katagori, ket, id_prov) 
                           VALUES ('$id', '$kode', '$nomor', '$nama', '$kategori', '$ket', '$id_prov')");

    if ($query) {
        echo "<script>
                alert('Data Saved Successfully');
                window.location.href = 'katagoriView1.php';
              </script>";
    } else {
        die('MySQL error: ' . mysqli_error($conn));
    }
} else {
    echo "Form not submitted.";
}
?>
