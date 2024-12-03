<?php
// Connection
include '../tools/koneksirifan.php';

// Header
include '../layout/header.php';

// Navbar
include '../layout/navbar.php';
?>

<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        background-color: #fff;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-color: ;
        color:;
        border-bottom: none;
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>

<div class="container py-4">
        <div class="card">
            <div class="card-header">
                <!-- Judul untuk card -->
                <h2 class="text-center fw-bold mb-0">Data Group</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <!-- Tabel untuk menampilkan data alternatif -->
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="table-info">
                                    <th>ID</th>
                                    <th>GROUP</th>
                                    
                                </tr>
                            </thead>

                        <tbody>
                            <?php
                            // Mengambil dan menampilkan data kriteria dari database
                            $data = $conn->query("SELECT * FROM tagroup");
                            $no = 1;
                            while ($kriteria = $data->fetch_assoc()) { ?>
                                    <tr>
                                        <!-- Menampilkan data kriteria dalam baris tabel -->
                                        <td><?= $kriteria['id'] ?></td>
                                        <td><?= $kriteria['namagroup'] ?></td>
                                    </tr>
                                    <?php } ?>
                        </tbody>
                    </table>
                    </div>
        </div>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
         