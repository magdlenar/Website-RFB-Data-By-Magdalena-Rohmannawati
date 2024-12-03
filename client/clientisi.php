<?php
// Connection
include '../tools/koneksirifan.php';

// Header
include '../layout/header.php';

// Navbar
include '../layout/navbar.php';
?>

<style>
    .card-header {
        background-color: ;
        color: ;
        border-bottom: none;
    }

    .criteria-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin: 0 -10px;
    }

    .criteria-item {
        flex-basis: calc(33.33% - 20px);
        margin: 0 10px;
        padding: 20px;
        background-color: #f0f0f0;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        color: #000; /* Text color */
    }

    .criteria-content {
        display: flex;
        align-items: center;
    }

    .criteria-content p {
        padding-top: 10px;
    }

    .criteria-icon {
        width: 50px;
        margin-right: 10px;
    }

    .criteria-description {
        margin-top: 10px;
        font-size: 14px;
        color: #6c757d;
    }

    .button {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-basis: calc(25% - 20px);
        text-align: center;
        padding: 20px;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        font-size: 1.5em; /* Ukuran teks lebih besar */
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        background-color: #45B649; /* Ubah sesuai dengan kebutuhan */
        margin: 10px;
    }

    .button img {
        width: 24px;
        height: 24px;
        margin-right: 10px;
    }

    .button span {
        margin-left: auto;
        display: flex;
        align-items: center;
        background: #fff;
        color: #000;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        justify-content: center;
    }

    .button::after {
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        width: 0;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        transition: width 0.3s;
    }

    .button:hover::after {
        width: 100%;
    }
</style>

<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <!-- Judul untuk card -->
            <h2 class="text-center fw-bold mb-0">Client Group</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3 text-end">
                        <!-- Tombol untuk memicu modal penambahan data baru -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAdd" id="add-button">Add</button>
                    
                        <!-- Tombol untuk memicu modal penambahan data baru -->
                        <button type="button" class="btn btn-outline-primary" onclick="window.location.href='daftargroup.php'">Daftar Group</button>

                    </div>
                    <!-- Tabel untuk menampilkan data kriteria -->
                    
                <form action="groupDelete.php" method="post">
                    <div class="criteria-row" id="criteria-row">
                        <p></p>
                        <?php
                        // Mengambil data dari tabel tagroup
                        $data = $conn->query("SELECT * FROM tagroup");
                        $no = 1;
                        while ($kriteria = $data->fetch_assoc()) { ?>
                            <div class="col-md-3">
                                <input type="checkbox" name="selected_ids[]" value="<?= $kriteria['id'] ?>">
                                <a href="../client/clientView.php?id=<?= $kriteria['id'] ?>" class="button" id="button-<?= $kriteria['id'] ?>">
                                    <div class="criteria-content">
                                        <p><?= $kriteria['namagroup'] ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">Delete Selected</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Add Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="clienttambah.php" method="post">
                    <div class="mb-3">
                        <label for="namagroup" class="form-label">Nama Group</label>
                        <input type="text" class="form-control" id="namagroup" name="namagroup" required>
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

<!-- Footer -->
<?php include '../layout/footer.php' ?>