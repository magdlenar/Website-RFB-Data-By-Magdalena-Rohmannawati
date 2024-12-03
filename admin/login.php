<?php

session_start();


include '../tools/koneksirifan.php';


if (isset($_SESSION["login_user"])) {
    header("location: ../beranda/beranda.php");
    exit();
}

if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan user berdasarkan username
    $query = $conn->query("SELECT * FROM users WHERE username = '$username'");

    // Cek apakah username ditemukan
    if (mysqli_num_rows($query) === 1) {
        $row = mysqli_fetch_assoc($query);
        $password_db = $row["password"]; // Password dari database
        $role = $row["role"];

        // Verifikasi password tanpa hashing
        if ($password === $password_db) {
            // Jika password benar, set sesi dan arahkan ke halaman sesuai role
            $_SESSION["login_user"] = true;
            $_SESSION["user_role"] = $role;

            if ($role === "admin") {
                header("Location: ../admin/dashboard.php");
            } elseif ($role === "bc") {
                header("Location: ../beranda/beranda.php");
            }
            exit();
        } else {
            // Jika password salah
            $error = "Password yang Anda masukkan salah.";
        }
    } else {
        // Jika username tidak ditemukan
        $error = "Username atau password yang Anda masukkan salah.";
    }
}

?>

<?php include '../layout/header.php'; ?>

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
                <img src="../gambar/l.png" alt="Illustration" class="img-fluid" style="height: 300px; width: 300px; object-fit: contain;">
            </div>
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center p-4">
                <div class="text-center mb-4">
                    <img src="../gambar/logo.png" alt="Logo" style="max-width: 110px; height: auto;">
                </div>
                <h3 class="text-center text-primary mb-4">PT RIFAN Financindo Berjangka Semarang</h3>

                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form action="" method="post" class="w-100 px-3">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" autocomplete="off" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <br>
                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-primary" name="login_user">Login</button>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>
