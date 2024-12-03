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
        color: ;
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
                <h2  class="text-center fw-bold mb-0">All data</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3 text-end">
                            <!-- Tombol untuk memicu modal penambahan data baru -->
                            
                            <button type="button" class="btn btn-outline-primary" onclick="window.open('../report/printPDF4.php', '_blank')">
                             Print PDF</button>
                             
                        </div>
                        <!-- Tabel untuk menampilkan data alternatif -->
                        
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="table-info">
                                    
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Katagori</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>

                        <tbody>
                            <?php
                            // Mengambil dan menampilkan data kriteria dari database
                            $data = $conn->query("SELECT dbn.id, dbn.kode, dbn.nomor, dbn.nama, dbn.katagori, dbn.ket, p.nama_prov
                            FROM database_nmr dbn
                            LEFT JOIN prov p ON dbn.id_prov = p.id_prov");
                            $no = 1;
                            while ($kriteria = $data->fetch_assoc()) { 
                                ?>
                                    <tr>
                                        <!-- Menampilkan data kriteria dalam baris tabel -->
                                    
                                        <td><?= $kriteria['nomor'] ?></td>
                                        <td><?= $kriteria['nama'] ?></td>
                                        <td><?= $kriteria['nama_prov'] ?></td>
                                        <td><?= $kriteria['katagori'] ?></td>
                                        <td><?= $kriteria['ket'] ?></td>
                                    </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
   

<!-- Modal untuk mengedit data alternatif -->


<!-- Footer -->
<?php include '../layout/footer.php' ?>
