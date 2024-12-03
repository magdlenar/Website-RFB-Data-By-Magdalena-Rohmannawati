<?php include '../layout/header.php'; ?>
<?php
include '../tools/koneksirifan.php';

if (isset($_POST['register_user'])) {
    // Mengambil nilai username dan password dari form
    $username = $_POST['username'];
    $password = $_POST['password']; // Menyimpan password tanpa hashing

    // Mengambil kode terakhir dari tabel users untuk menentukan kode baru
    $query_last_code = $conn->query("SELECT MAX(id) AS last_code FROM users");
    $row = $query_last_code->fetch_assoc();
    $last_code = $row['last_code'];

    // Menentukan kode berikutnya
    if ($last_code === null) {
        $next_code = 1;
    } else {
        $next_code = intval($last_code) + 1;
    }

    // Format kode dengan leading zero
    $id = sprintf("%04d", $next_code); 

    // Persiapan query untuk memasukkan data ke database
    $query = $conn->prepare("INSERT INTO users (id, username, password, role) VALUES (?, ?, ?, 'bc')");
    $query->bind_param("iss", $id, $username, $password); // Menggunakan password langsung tanpa hashing

    // Menjalankan query dan memeriksa hasilnya
    if ($query->execute()) {
        // Redirect ke halaman home setelah berhasil registrasi
        header("location: ../admin/add_user.php");
        exit();
    } else {
        // Mengeset variabel error menjadi true jika terjadi kesalahan saat eksekusi query
        $error = true; 
    }
}


if (isset($_POST['update'])) {
    // Mengambil nilai dari inputan id, username, dan password yang dikirimkan melalui POST
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Menjalankan query MySQL untuk melakukan update data di tabel users berdasarkan id
    $query = $conn->query("UPDATE users SET username='$username', password='$password' WHERE id='$id'");

    // Memeriksa apakah query berhasil dijalankan
    if ($query === TRUE) {
        // Menampilkan alert bahwa data berhasil disimpan dan mengarahkan ke halaman add_user.php
        echo "<script>
                alert('Data Saved Successfully');
                window.location='add_user.php';
              </script>";
    } else {
        // Menampilkan pesan error MySQL jika query tidak berhasil dijalankan
        die('MySQL error: ' . mysqli_error($conn));
    }
}


// Mengambil nilai id alternatif dari parameter GET

?>
<style>
    body {
        background-color: #f8f9fa;
    }
    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #45B649;
        padding-top: 20px;
    }
    .sidebar a {
        font-size: 16px;
        color: #ddd;
        display: block;
        padding: 15px;
        text-decoration: none;
    }
    .sidebar a:hover, .sidebar .active {
        background-color: red;
        color: white;
    }
    .sidebar a.text-danger:hover {
    color: #45B649; /* Warna hijau */
    }
    .content {
        margin-left: 250px;
        padding: 20px;
    }
    .card {
        background-color: #fff;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .hero-banner {
        background-image: url('../gambar/foto.jpg');
        background-size: cover;
        background-position: center;
        height: 300px; 
        position: relative; 
        display: flex;
        justify-content: center; 
        align-items: center; 
    }

    .hero-banner::before {
        content: ''; 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); 
    }

    .hero-content {
        padding: 20px;
        text-align: center;
        color: #fff;
        position: relative; 
        z-index: 1;
    }

    .mission-box {
        display: flex;
        align-items: center;
        padding: 20px;
        background-color: #f0f0f0;
        border-radius: 5px;
        margin-top: 50px;
        margin-bottom: 20px;
    }

    .mission-text {
        margin-left: 30px;
        flex: 1;
    }

    .mission-text h2 {
        padding-top: 20px;
        font-size: 20px;
    }

    .mission-image {
        flex: 1;
        text-align: center;
    }

    .mission-image img {
        max-width: 100%;
        height: 200px;
    }

    .selection-process {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-top: 20px;
    }

    .process-step {
        flex-basis: calc(25% - 20px); 
        background-color: #f0f0f0;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .step-content {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }

    .step-illustration {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .step-header {
    background-color: #fff;
    color: #E30613;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    margin: 0;
    position: relative;
    width: 100%;
    text-align: center;
    bottom: 0;
    text-decoration: none; /* Menghapus underline */
}


    .process-step:hover .step-header {
        background-color: #45B649; /* Warna hijau */
        color: #fff;
    }
    .step-content p {
        margin: 0;
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

    .process-step:hover, .criteria-item:hover {
        transform: translateY(-5px); 
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5); 
        background-color: #fff; 
        border: 0.5px solid #000; 
        transition: all 0.3s ease;
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
            background-color: #9bcc3a; /* Ubah sesuai dengan kebutuhan */
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
        .password {
            cursor: pointer;
        }
        .sidebar a.logout {
        color: red; /* Warna merah untuk teks */
    }

    .sidebar a.logout:hover {
        color: #45B649; /* Jika ingin warna hijau saat hover */
    }
</style>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">



<!-- Bootstrap JavaScript Bundle (termasuk Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="sidebar">
    <div class="text-center mb-4">
        <h4 class="text-light">Admin Dashboard</h4>
    </div>
    <a href="dashboard.php"><i class="bi bi-house"></i> Home</a>
    <a href="add_user.php" class="active"><i class="bi bi-person"></i> Bussiness Consultant</a>
    
    <div class="mt-auto">
        <a href="../login/userLogout.php" class="logout">Logout</a>
    </div>
</div>

<div class="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center fw-bold mb-0">Account Bussiness Consultant</h2>
            </div>
            <div class="card-body">
                <div class="text-end mb-3">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAdd">Add</button>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr style="background-color: #45B649;">
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = $conn->query("SELECT * FROM users");
                        $no = 1;
                        while ($kriteria = $data->fetch_assoc()) { 
                            if ($kriteria['role'] == "bc") { ?>
                                <tr>
                                    <td><?= $kriteria['username'] ?></td>
                                    <td>
                        <!-- Password dalam bentuk span dengan efek hover -->
                                        <span 
                                            class="password" 
                                            id="password<?= $kriteria['id'] ?>" 
                                            data-password="<?= $kriteria['password'] ?>" 
                                            onmouseover="showPassword(<?= $kriteria['id'] ?>)" 
                                            onmouseout="hidePassword(<?= $kriteria['id'] ?>)">
                                            ****
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $kriteria['id']; ?>">Edit</a>
                                            <a href="deleteuser.php?id=<?= $kriteria['id']; ?>" class="btn btn-outline-danger" onclick="return confirm('Delete this data?')">Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalEdit<?= $kriteria['id']; ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $kriteria['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalEditLabel<?= $kriteria['id']; ?>">Edit Account</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="add_user.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $kriteria['id']; ?>">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" value="<?= $kriteria['username']; ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" name="update">Update</button> 
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } 
                        } ?>
                    </tbody>
                </table>
                <script>
                    function showPassword(id) {
                        const passwordField = document.getElementById(`password${id}`);
                        passwordField.textContent = passwordField.getAttribute("data-password"); // Menampilkan password asli
                    }

                    function hidePassword(id) {
                        const passwordField = document.getElementById(`password${id}`);
                        passwordField.textContent = "****"; // Menyembunyikan password kembali
                    }
                    </script>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Add Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add_user.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" autofocus required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin" disabled>Admin</option>
                            <option value="bc" selected>Bussiness Consultant</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" name="register_user">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
