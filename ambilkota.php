<?php
include '../tools/koneksirifan.php';

$prov = $_GET['prov'];
$kabkot = mysqli_query($conn, "SELECT id_kabkot, nama_kabkot FROM kabkot WHERE id_prov='$prov' ORDER BY nama_kabkot");

echo "<option>-- Pilih Kabupaten/Kota --</option>";
while ($k = mysqli_fetch_array($kabkot)) {
    echo "<option value=\"" . $k['id_kabkot'] . "\">" . $k['nama_kabkot'] . "</option>\n";
}
?>
