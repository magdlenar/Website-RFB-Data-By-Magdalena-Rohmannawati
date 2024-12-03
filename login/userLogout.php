<?php
// Memulai session
session_start();
// Mengosongkan semua data dalam session
$_SESSION = [];
// Menghapus semua variabel session
session_unset();
// Mengakhiri session
session_destroy();

// Mengarahkan ke halaman login user
header("location: ../admin/login.php");
exit();

