<?php
// Memulai sesi untuk penggunaan session
session_start();

// Menginclude file koneksi ke database
include '../tools/connection.php';

if (isset($_SESSION["login_admin"])) {
    // Redirect ke halaman admin jika sudah login
    header("location: ../admin/admin.php");
    exit();
}

if (isset($_POST['login_admin'])) {
    // Mengambil nilai dari input email dan password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mengambil data admin berdasarkan email
    $query = $conn->query("SELECT * FROM ta_admin WHERE email = '$email'");

    // Memeriksa keberadaan email
    if (mysqli_num_rows($query) === 1) {
        // Mengambil password terenkripsi dari database
        $row = mysqli_fetch_assoc($query);
        $hashed_password = $row["password"];

        // Memverifikasi password
        if (password_verify($password, $hashed_password)) {
            // Password cocok, set session
            session_start();
            // Set session login_admin menjadi true
            $_SESSION["login_admin"] = true;
            // Simpan email admin dalam session
            $_SESSION["admin_email"] = $email; // Store email in session
            // Redirect ke halaman admin setelah login berhasil
            header("location: ../admin/admin.php");
            exit();
        }
    }
    // Login gagal, set flag error
    $error = true;
}
?>

<!-- Menginclude header pada halaman -->
<?php include '../includes/header.php' ?>

<style>
    .background-container {
        position: relative;
        height: 100vh;
        width: 100%;
        background: url('../img/unram.jpg') no-repeat center center fixed;
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
        background-color: rgba(27, 27, 27, 0.8); 
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
                <img src="../img/admin.png" alt="Illustration" class="img-fluid" style="height: 300px; width: 300px; object-fit: contain;">
            </div>
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center p-4">
                <div class="text-center mb-4">
                    <img src="../img/logo-unram.png" alt="Logo" style="max-width: 110px; height: auto;">
                </div>
                <!-- Nama sistem -->
                <h3 class="text-center text-primary mb-4">Indonesia Pintar Scholarship Program Recipient Recommendation</h3>

                <?php if (isset($error)) : ?>
                    <!-- Menampilkan pesan kesalahan jika login gagal -->
                    <div class="alert alert-danger" role="alert">
                        Email atau Password salah!
                    </div>
                <?php endif; ?>

                <!-- Form untuk login -->
                <form action="" method="post" class="w-100 px-3">
                    <div class="mb-3">
                        <!-- Input untuk email -->
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" autocomplete="off" autofocus required>
                    </div>
                    <div class="mb-3">
                        <!-- Input untuk password -->
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <!-- Tombol untuk submit login -->
                    <button type="submit" class="btn btn-primary btn-block" name="login_admin">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

