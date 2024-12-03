<?php
include '../tools/koneksirifan.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'];  
    $kode = $_POST['kode'];
    $nomor = $_POST['nomor']; 
    $nama = $_POST['nama'];
    $kategori = $_POST['katagori']; 
    $ket = $_POST['ket'];
    $id_prov = $_POST['id_prov'];

    
    $query_last_code = $conn->query("SELECT MAX(id) AS last_code FROM database_nmr");
    $row = $query_last_code->fetch_assoc();
    $last_code = $row['last_code'];

  
    if ($last_code === null) {
        $next_code = 1;
    } else {
        $next_code = intval($last_code) + 1;
    }

   
    $id = sprintf("%04d", $next_code); 

    if (empty($kode) || empty($nomor) || empty($nama) || empty($kategori) || empty($ket) || empty($id_prov)) {
        die("Semua field harus diisi.");
    }

    
    $query = $conn->query("INSERT INTO database_nmr (id, kode, nomor, nama, katagori, ket, id_prov) 
                           VALUES ('$id', '$kode', '$nomor', '$nama', '$kategori', '$ket', '$id_prov')");

    if ($query) {
        echo "<script>
                alert('Data Saved Successfully');
                window.location.href = 'katagoriView.php';
              </script>";
    } else {
        die('MySQL error: ' . mysqli_error($conn));
    }
} else {
    echo "Form not submitted.";
}
?>
