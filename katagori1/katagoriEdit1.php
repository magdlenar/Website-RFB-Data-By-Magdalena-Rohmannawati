<?php
// Include the database connection file
include '../tools/koneksirifan.php';  // Update the path if needed

if (isset($_POST['update'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nomor = $_POST['nomor'];
    $nama = $_POST['nama'];
    $kategori = $_POST['katagori']; 
    $ket = $_POST['ket'];
    $id_prov = $_POST['id_prov']; // Menambahkan id_prov

    // Memeriksa apakah 'kode' ada di tabel tagroup
    $query_check = $conn->query("SELECT id FROM tagroup WHERE id = '$kode'");
    
    if ($query_check->num_rows == 0) {
        die("Error: Invalid 'kode' value. The 'kode' must exist in 'tagroup' table.");
    }
    
    // Melakukan update jika valid
    $query = $conn->query("UPDATE database_nmr 
                           SET kode='$kode', nomor='$nomor', nama='$nama', katagori='$kategori', ket='$ket', id_prov='$id_prov' 
                           WHERE id='$id'");

    if ($query === TRUE) {
        echo "<script>
                alert('Data Saved Successfully');
                window.location='katagoriView1.php';
              </script>";
    } else {
        die('MySQL error: ' . mysqli_error($conn));
    }
}
?>
