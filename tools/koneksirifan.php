<?php
// Connection
$conn = mysqli_connect("localhost", "root", "", "rifan");

// Check
if (!$conn) {
    die("Gagal terkoneksi : " . mysqli_connect_error());
}
