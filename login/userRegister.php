<?php
// Memulai session PHP
session_start();

// Menginclude file koneksi ke database
include '../tools/koneksirifan.php';

// Memeriksa jika pengguna sudah login, maka arahkan ke halaman home
if (isset($_SESSION["login_user"])) {
    header("location: ../beranda/beranda.php");
    exit();
}

// Inisialisasi variabel error
$error = false;

// Memeriksa apakah form register telah disubmit
if (isset($_POST['register_user'])) {
    // Mengambil nilai username dan password dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menghash password menggunakan bcrypt
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Mengambil kode terakhir dari tabel user untuk menentukan kode baru
    $query_last_code = $conn->query("SELECT MAX(kode) AS last_code FROM user");
    $row = $query_last_code->fetch_assoc();
    $last_code = $row['last_code'];

    // Menentukan kode berikutnya
    if ($last_code === null) {
        $next_code = 1;
    } else {
        $next_code = intval($last_code) + 1;
    }
    // Format kode dengan leading zero
    $kode = sprintf("%04d", $next_code); 

    // Persiapan query untuk memasukkan data ke database
    $query = $conn->prepare("INSERT INTO user (kode, username, password) VALUES (?, ?, ?)");
    $query->bind_param("sss", $kode, $username, $hashed_password);

    // Menjalankan query dan memeriksa hasilnya
    if ($query->execute()) {
        // Redirect ke halaman home setelah berhasil registrasi
        header("location: ../beranda/beranda.php");
        exit();
    } else {
        // Mengeset variabel error menjadi true jika terjadi kesalahan saat eksekusi query
        $error = true; 
    }
}
?>

<?php include '../layout/header.php' ?>

<style>
    .login-link {
        font-size: 14px;
    }
    .background-container {
        position: relative;
        height: 100vh;
        width: 100%;
        background: url('../gambar/logo.png') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .background-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 56, 0.7); 
        z-index: 1;
    }
    .content-container {
        position: relative;
        z-index: 2;
        width: 90%;
        max-width: 900px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .illustration-container {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f2f2f2; 
    }
</style>

<body>
    <div class="background-container">
        <div class="background-overlay"></div>
        <div class="content-container">
            <div class="row no-gutters">
                <div class="col-md-6 illustration-container">
                    <!-- Illustrasi gambar untuk halaman registrasi -->
                    <img src="../gambar/l.png" alt="Illustration" class="img-fluid" style="height: 300px; width: 300px; object-fit: contain;">
                </div>
                <div class="col-md-6 d-flex flex-column align-items-center justify-content-center p-4">
                    <div class="text-center mb-4">
                        <!-- Logo Universitas dan judul sistem -->
                        <img src="../gambar/logo.png" alt="Logo" style="max-width: 110px; height: auto;">
                    </div>
                    <h3 class="text-center text-primary mb-4">PT RIFAN Financindo Berjangka Semarang</h3>

                    <?php if ($error) : ?>
                        <!-- Alert untuk menampilkan pesan kesalahan jika registrasi gagal -->
                        <div class="alert alert-danger" role="alert">
                            Failed to create account. Please try again.
                        </div>
                    <?php endif; ?>

                    <form action="" method="post" class="w-100 px-3">
                        <div class="mb-3">
                            <!-- Input untuk username -->
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" autofocus required>
                        </div>
                        <div class="mb-3">
                            <!-- Input untuk password -->
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <br>
                        <div class="d-grid gap-2 mb-4">
                            <!-- Tombol untuk submit form registrasi -->
                            <button type="submit" class="btn btn-primary" name="register_user">Register</button>
                        </div>
                        <div class="d-flex justify-content-end">
                            <!-- Link untuk menuju halaman login -->
                            <p class="mb-0 login-link">Already Have An Account? <a href="../login/userLogin.php">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
