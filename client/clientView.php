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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<div class="container py-4">
        <div class="card">
            <div class="card-header">
                <!-- Judul untuk card -->
                <h2  class="text-center fw-bold mb-0">Database Nomor</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3 text-end">
                            <!-- Tombol untuk memicu modal penambahan data baru -->
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">Add</button>
                            
                             
                        </div>
                        <!-- Tabel untuk menampilkan data alternatif -->
                        <form action="clientAdd.php" method="post">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="table-info">
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Katagori</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                        <tbody>
                        <?php
                            $id = isset($_GET['id']) ? $_GET['id'] : '';

                            // Cek apakah ID ada di URL
                            if (!empty($id)) {
                                // Gunakan prepared statement untuk menghindari SQL injection
                                $stmt = $conn->prepare("SELECT dbn.id, dbn.kode, dbn.nomor, dbn.nama, dbn.katagori, dbn.ket, p.nama_prov
                                                        FROM database_nmr dbn
                                                        LEFT JOIN prov p ON dbn.id_prov = p.id_prov
                                                        WHERE dbn.kode = ?");
                                $stmt->bind_param("s", $id);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                // Cek apakah data ditemukan
                                if ($result->num_rows > 0) {
                                    while ($kriteria = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= htmlspecialchars($kriteria['nomor']) ?></td>
                                            <td><?= htmlspecialchars($kriteria['nama']) ?></td>
                                            <td><?= htmlspecialchars($kriteria['nama_prov']) ?></td>
                                            <td><?= htmlspecialchars($kriteria['katagori']) ?></td>
                                            <td><?= htmlspecialchars($kriteria['ket']) ?></td>
                                            <td>
                                                <!-- Tombol untuk mengedit dan menghapus data kriteria -->
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $kriteria['id']; ?>">Edit</a>
                                                    <a href="clientDelete.php?id=<?= $kriteria['id']; ?>&kode=<?= $id; ?>" class="btn btn-outline-danger" onclick="return confirm('Delete this data?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="modalEdit<?= $kriteria['id']; ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $kriteria['id']; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditLabel<?= $kriteria['id']; ?>">Edit Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="clientEdit.php" method="post">
                                                            <input type="hidden" name="id" value="<?= htmlspecialchars($kriteria['id']); ?>">

                                                            <div class="mb-3">
                                                                <label for="kode" class="form-label">Group</label>
                                                                <select class="form-control" id="kode" name="kode" readonly required>
                                                                    <?php
                                                                    // Query untuk mendapatkan data grup
                                                                    $query_group = "SELECT id, namagroup FROM tagroup";
                                                                    $result_group = mysqli_query($conn, $query_group);
                                                                    if ($result_group) {
                                                                        while ($row = mysqli_fetch_assoc($result_group)) {
                                                                            $selected = ($row['id'] == $kriteria['kode']) ? 'selected' : '';
                                                                            echo "<option value='" . $row['id'] . "' $selected>" . $row['namagroup'] . "</option>";
                                                                        }
                                                                    } else {
                                                                        echo "<option value=''>No data available</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="nomor" class="form-label">Nomor</label>
                                                                <input type="text" class="form-control" id="nomor" name="nomor" value="<?= htmlspecialchars($kriteria['nomor']); ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($kriteria['nama']); ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="id_prov" class="form-label">Alamat</label>
                                                                <select class="form-control" id="id_prov" name="id_prov" >
                                                                    <?php
                                                                        // Query untuk mendapatkan data provinsi
                                                                        $query_prov = "SELECT id_prov, nama_prov FROM prov";
                                                                        $result_prov = mysqli_query($conn, $query_prov);
                                                                        if ($result_prov) {
                                                                            while ($row = mysqli_fetch_assoc($result_prov)) {
                                                                                // Cek apakah provinsi saat ini harus diseleksi
                                                                                $selected = ($row['nama_prov'] == htmlspecialchars($kriteria['nama_prov'])) ? 'selected' : '';
                                                                                echo "<option value='" . $row['id_prov'] . "' $selected>" . $row['nama_prov'] . "</option>";
                                                                            }
                                                                        } else {
                                                                            echo "<option value=''>No data available</option>";
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="katagori" class="form-label">Katagori</label>
                                                                <select class="form-control" id="katagori" name="katagori" required>
                                                                    <option value="belum diangkat" <?= $kriteria['katagori'] == 'belum diangkat' ? 'selected' : '' ?>>Belum Diangkat</option>
                                                                    <option value="proses broadcast" <?= $kriteria['katagori'] == 'proses broadcast' ? 'selected' : '' ?>>Proses Broadcast</option>
                                                                    <option value="diblokir" <?= $kriteria['katagori'] == 'diblokir' ? 'selected' : '' ?>>Diblokir</option>
                                                                    <option value="appointment" <?= $kriteria['katagori'] == 'appointment' ? 'selected' : '' ?>>Appointment</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="ket" class="form-label">Keterangan</label>
                                                                <input type="text" class="form-control" id="ket" name="ket" value="<?= htmlspecialchars($kriteria['ket']); ?>" required>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }}}?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Add Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="clientAdd.php" method="post">
                    <div class="mb-3">
                        <label for="kode" class="form-label">Group</label>
                        <select class="form-control" id="kode" name="kode" readonly required>
                            <option value="">Select an ID</option>
                            <?php
                            include 'koneksirifan.php';

                            // Mengambil nilai id dari URL jika ada
                            $selectedId = isset($_GET['id']) ? $_GET['id'] : '';

                            // Query untuk mendapatkan data grup
                            $sql = "SELECT id, namagroup FROM tagroup";
                            $result = $conn->query($sql);

                            // Jika ada data, tampilkan dalam dropdown dengan selected option sesuai URL
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $selected = ($row["id"] == $selectedId) ? 'selected' : '';
                                    echo "<option value='" . $row["id"] . "' $selected>" . $row["namagroup"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No data available</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_prov" class="form-label">Alamat</label>
                        <select class="form-control" id="id_prov" name="id_prov" required>
                            <option value="">Pilih Alamat</option>
                            <?php
                            $query_prov = "SELECT id_prov, nama_prov FROM prov";
                            $result_prov = $conn->query($query_prov);

                            if ($result_prov->num_rows > 0) {
                                while ($row = $result_prov->fetch_assoc()) {
                                    echo "<option value='" . $row["id_prov"] . "'>" . $row["nama_prov"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No data available</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="katagori" class="form-label">Katagori</label>
                        <select class="form-control" id="katagori" name="katagori" required>
                            <option value="belum diangkat">Belum Diangkat</option>
                            <option value="proses broadcast">Proses Broadcast</option>
                            <option value="diblokir">Diblokir</option>
                            <option value="appointment">Appointment</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ket" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="ket" name="ket" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="save-button">Save</button>
                </form>
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
