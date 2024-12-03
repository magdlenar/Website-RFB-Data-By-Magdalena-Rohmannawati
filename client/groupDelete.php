<?php
// Connection
include '../tools/koneksirifan.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah ada ID yang dipilih
    if (isset($_POST['selected_ids']) && is_array($_POST['selected_ids'])) {
        // Ambil ID yang dipilih
        $selected_ids = $_POST['selected_ids'];
        // Buat query delete dengan placeholder
        $placeholders = implode(',', array_fill(0, count($selected_ids), '?'));
        $sql = "DELETE FROM tagroup WHERE id IN ($placeholders)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameter
        $types = str_repeat('i', count($selected_ids));
        $stmt->bind_param($types, ...$selected_ids);
        
        // Eksekusi query
        if ($stmt->execute()) {
            echo "Data berhasil dihapus";
        } else {
            echo "Gagal menghapus data: " . $conn->error;
        }
        
        $stmt->close();
    }
}

// Redirect kembali ke halaman utama setelah menghapus
header("Location: clientisi.php");
exit();
?>
