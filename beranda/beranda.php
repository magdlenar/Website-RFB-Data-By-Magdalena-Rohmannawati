
<!-- Header -->
<?php include '../layout/header.php'; ?>

<!-- Navbar -->
<?php include '../layout/navbar.php'; ?>


<style>
    body {
        background-color: #f8f9fa;
    }

    .card-body {
        background-color: #fff;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        margin-top: 50px; 
        padding: 0 88px; 
    }

    .card-header {
        background-color: #17a2b8;
        color: #fff;
        border-bottom: none;
    }

    .card-title {
        font-size: 20px;
        margin-top: 40px;
        text-align: left; 
        margin-bottom: 20px; 
    }

    .card-content {
        text-align: justify; 
        line-height: 1.6; 
    }

    .card-content p {
        margin-bottom: 15px; 
    }

    .card-content ul, .card-content ol {
        padding-left: 20px; 
    }

    .card-content ul li, .card-content ol li {
        margin-bottom: 5px; 
    }

    .card-content h3 {
        font-size: 20px;
        margin-top: 50px; 
        margin-bottom: 20px;
        text-align: center;
    }

    .hero-banner {
        background-image: url('../gambar/default.jpg');
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
    </style>
</style>

<div class="container-fluid p-0">
    <!-- Hero Banner -->
    <div class="hero-banner">
        <div class="hero-content">
            <h1>Welcome to RFB Data</h1>
            <a href="#katagori" class="btn btn-outline-light">Start</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="card">
        <div class="card-body">
            <!-- Introduction to the portal -->
            <div class="card-content">

                <!-- Selection Process Section -->
                <h3 id="katagori">Category</h3>
                <div class="selection-process">
                    <!-- Registration -->
                    <a href="../katagori/katagoriView.php"class="process-step">
                        <div class="step-header">Belum Diangkat</div>
                        <div class="step-content">
                            <img src="../gambar/ba.png" alt="Step 1 Illustration" class="step-illustration">
                            
                        </div>
                    </a>
                    <a href="../katagori1/katagoriView1.php"class="process-step">
                        <div class="step-header">Proses Broadcast</div>
                        <div class="step-content">
                            <img src="../gambar/bc.png" alt="Step 1 Illustration" class="step-illustration">
                            
                        </div>
                    </a>
                    <a href="../katagori2/katagoriView2.php"class="process-step">
                        <div class="step-header">Diblokir</div>
                        <div class="step-content">
                            <img src="../gambar/db.png" alt="Step 1 Illustration" class="step-illustration">
                            
                        </div>
                    </a>
                     <a href="../katagori3/katagoriView3.php"class="process-step">
                        <div class="step-header">Appointment</div>
                        <div class="step-content">
                            <img src="../gambar/app.png" alt="Step 1 Illustration" class="step-illustration">
                            
                        </div>
                    </a>
                </div>
                
                <!-- Call to Action Section -->
                <h3 style="font-size: 20px; text-align: left;"></h3>
                <br><br>    
            </div>
        </div>
    </div>
</div>

<br>
<!-- Footer -->
<?php include '../layout/footer.php'; ?>
