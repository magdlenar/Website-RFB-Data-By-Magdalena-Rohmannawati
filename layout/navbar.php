<!-- Header -->
<?php include '../layout/header.php' ?>

<style>
    .navbar {
        padding: 0;
    }
    .navbar-brand img {
        max-height: 60px; 
        margin-right: 10px; 
    }
    .navbar-nav {
        margin-left: auto;
    }
    .navbar-nav .nav-link {
        padding: 1rem;
    }
</style>

<div class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Nama sistem -->
        <a class="navbar-brand" href="#">
            <img src="..\gambar\logo.png" alt="Logo">PT RIFAN Financindo Berjangka Semarang
        </a>

        <!-- Button untuk toggle menu navigasi pada layar lebih kecil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu navigasi navbar -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!-- Link navigasi -->
                <a class="nav-link" href="../beranda/beranda.php">Beranda</a>
                <a class="nav-link" href="../alldata/alldata.php">All Data</a>
                <a class="nav-link" href="../client/clientisi.php">Client Group</a>
                <a class="nav-link" href="../login/userLogout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<?php include '../layout/header.php' ?>
