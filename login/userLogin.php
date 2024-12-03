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

// Memeriksa apakah form login telah disubmit
if (isset($_POST['login_user'])) {
    // Mengambil nilai username dan password dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengeksekusi query untuk mengambil data pengguna berdasarkan username
    $query = $conn->query("SELECT * FROM user WHERE username = '$username'");

    // Memeriksa apakah username ditemukan dalam database
    if (mysqli_num_rows($query) === 1) {
        // Mengambil data pengguna
        $row = mysqli_fetch_assoc($query);
        $hashed_password = $row["password"];

        // Memverifikasi password menggunakan fungsi password_verify dari PHP
        if (password_verify($password, $hashed_password)) {
            // Jika password cocok, set session login_user menjadi true
            $_SESSION["login_user"] = true;
            // Redirect ke halaman home setelah login berhasil
            header("location: ../beranda/beranda.php");
            exit();
        }
    }
    // Jika login gagal, set variabel error untuk menampilkan pesan kesalahan
    $error = true; 
}
?>

<?php include '../layout/header.php' ?>

<style>
    .register-link {
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

<div class="background-container">
    <div class="background-overlay"></div>
    <div class="content-container">
        <div class="row no-gutters">
            <div class="col-md-6 illustration-container">
                <!-- Illustrasi gambar untuk halaman login -->
                <img src="../gambar/l.png" alt="Illustration" class="img-fluid" style="height: 300px; width: 300px; object-fit: contain;">
            </div>
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center p-4">
                <div class="text-center mb-4">
                    <!-- Logo Universitas dan judul sistem -->
                    <img src="../gambar/logo.png" alt="Logo" style="max-width: 110px; height: auto;">
                </div>
                <h3 class="text-center text-primary mb-4">PT RIFAN Financindo Berjangka Semarang</h3>

                <?php if (isset($error)) : ?>
                    <!-- Alert untuk menampilkan pesan kesalahan jika login gagal -->
                    <div class="alert alert-danger" role="alert">
                        Incorrect Username or Password!
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
                        <!-- Tombol untuk submit form login -->
                        <button type="submit" class="btn btn-primary" name="login_user">Login</button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <!-- Link untuk menuju halaman registrasi -->
                        <p class="mb-0 register-link">Doesn't Have An Account? <a href="../login/userRegister.php">Register</a></p>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
