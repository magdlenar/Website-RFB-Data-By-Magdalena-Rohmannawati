<?php
// Menginclude file koneksi ke database
include '../tools/koneksirifan.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected'])) {
    $selectedIds = $_POST['selected'];
    $ids = implode(",", array_map('intval', $selectedIds)); // Sanitasi input

    // Ambil data berdasarkan id yang dipilih
    $result = $conn->query("SELECT * FROM database_nmr WHERE id IN ($ids)");

    if ($result->num_rows > 0) {
        echo "<h1>Selected Data</h1>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nomor</th><th>Nama</th><th>Keterangan</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nomor']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ket']) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No data found.";
    }
} else {
    echo "No data selected.";
}
?>
