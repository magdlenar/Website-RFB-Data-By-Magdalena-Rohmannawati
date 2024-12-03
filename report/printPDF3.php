<?php
// Connection
include '../tools/koneksirifan.php';

// Header
include '../layout/header.php';
?>

<style>
    body {
        font-family: 'Times New Roman', Times, serif;
    }
    .label {
        display: inline-block;
        width: 80px; 
    }
</style>

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <!-- Kop Surat -->
        <div class="d-flex align-items-center justify-content-center">
            <div>
                <img src="../gambar/logo.png" alt="Logo" style="width:115px;height:auto; margin-right: 20px;">
            </div>
            <div class="text-center">
                <h5 class="fw-bold m-0">PT RIFAN Financindo Berjangka Semarang</h5>
                <p class="m-0">Corner, Ruko Jl. Letnan Jenderal S. Parman No.47A Unit 5-6, Gajahmungkur, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50231</p>
                <p class="m-0">Laman : www.rf-berjangka.com</p>
            </div>
        </div>
        <hr>
        <br>

        <?php
        // Inisialisasi array kosong untuk menyimpan peringkat
    
        // Inisialisasi array kosong untuk menyimpan peringkat
        
        // Tampilkan data dalam tabel
        ?>
        
        <div class="row mt-3">
            <div class="col-1"></div>
            <div class="col-10">
                <!-- Tabel untuk menampilkan peringkat alternatif -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $conn->query("SELECT dbn.id, dbn.kode, dbn.nomor, dbn.nama, dbn.katagori, dbn.ket, p.nama_prov
                            FROM database_nmr dbn
                            LEFT JOIN prov p ON dbn.id_prov = p.id_prov");
                        $no = 1;
                        while ($row = $data->fetch_assoc()) { 
                            if ($row['katagori'] == "appointment") { ?>
                
                            <tr>
                                <!-- Menampilkan data kriteria dalam baris tabel -->
                                <td><?= htmlspecialchars($row['nomor']) ?></td>
                                <td><?= htmlspecialchars($row['nama']) ?></td>
                                <td><?= htmlspecialchars($row['nama_prov']) ?></td>
                                <td><?= htmlspecialchars($row['ket']) ?></td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>


<script>
    // Cetak halaman ini saat diakses
    window.print();
</script>
