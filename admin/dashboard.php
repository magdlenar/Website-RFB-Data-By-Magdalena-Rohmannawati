<?php include '../layout/header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling Sidebar */
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
        .sidebar a:hover {
            background-color: red;
            color: white;
        }
        .sidebar a.text-danger:hover {
        color: #45B649; /* Warna hijau */
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }
        .sidebar .nav-header {
            color: red;
            padding: 10px 15px;
            text-transform: uppercase;
            font-size: 14px;
        }
        .sidebar .active {
            background-color: red;
        }

        /* Main Content Styling */
        body {
            background-color: #f8f9fa;
        }
        .card-body {
            background-color: #fff;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 20px;
        }
        .card-title {
            font-size: 20px;
            margin-top: 20px;
            text-align: left;
            margin-bottom: 20px;
        }

        /* Category Section Styling */
        .category-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 20px;
        }
        .category-card {
            flex: 1;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s;
        }
        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.15);
        }
        .category-card img {
            height: 80px;
            width: 80px;
            margin-bottom: 15px;
        }
        .category-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }
        .sidebar a.logout {
        color: red; /* Warna merah untuk teks */
    }

    .sidebar a.logout:hover {
        color: #45B649; /* Jika ingin warna hijau saat hover */
    }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center mb-4">
            <h4 class="text-light">Admin Dashboard</h4>
        </div>
        <a href="dashboard.php" class="active"><i class="bi bi-house"></i> Home</a>
        <a href="add_user.php"><i class="bi bi-person"></i> Bussiness Consultant</a>
        <div class="mt-auto">
        <a href="../login/userLogout.php" class="logout">Logout</a>
    </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        
        <div class="card">
        <div class="card-header">
                <h2 class="text-center fw-bold mb-0">Catagory</h2>
            </div>
                <div class="category-container">
                    <a href="../katagori/katagoriView.php" class="category-card">
                        <img src="../gambar/ba.png" alt="Belum Diangkat">
                        <div class="category-title">Belum Diangkat</div>
                    </a>
                    <a href="../katagori1/katagoriView1.php" class="category-card">
                        <img src="../gambar/bc.png" alt="Proses Broadcast">
                        <div class="category-title">Proses Broadcast</div>
                    </a>
                    <a href="../katagori2/katagoriView2.php" class="category-card">
                        <img src="../gambar/db.png" alt="Diblokir">
                        <div class="category-title">Diblokir</div>
                    </a>
                    <a href="../katagori3/katagoriView3.php" class="category-card">
                        <img src="../gambar/app.png" alt="Appointment">
                        <div class="category-title">Appointment</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
