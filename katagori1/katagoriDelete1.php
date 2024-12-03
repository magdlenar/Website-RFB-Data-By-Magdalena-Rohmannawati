<?php

include '../tools/koneksirifan.php';

$id = $_GET['id'];


$query = $conn->query("DELETE FROM database_nmr WHERE id='$id'");


if ($query == True) {
    
    echo "<script>
        alert('Data Deleted Successfully');
        window.location='katagoriView1.php';
        </script>";
} else {
    
    die('MySQL error : ' . mysqli_errno($conn));
}
?>