<?php
include_once 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pengaduan Warga</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Pengaduan Warga</h1>
            <nav>
                <a href="index.php" class="text-white mx-2">Beranda</a>
                <a href="pages/pengaduan.php" class="text-white mx-2">Pengaduan</a>
                <a href="pages/informasi.php" class="text-white mx-2">Informasi</a>
                <a href="pages/kegiatan.php" class="text-white mx-2">Kegiatan</a>
                <a href="pages/diskusi.php" class="text-white mx-2">Diskusi</a>
                <a href="pages/login.php" class="text-white mx-2">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h2 class="display-4">Selamat Datang di Web Pengaduan Warga</h2>
            <p class="lead">Laporkan masalah, dapatkan informasi terbaru, dan diskusikan solusi bersama warga!</p>
            <a href="templates/pengaduan.php" class="btn btn-light btn-lg">Buat Pengaduan</a>
        </div>
    </section>

    <!-- Fitur Utama -->
    <section class="py-5">
        <div class="container text-center">
            <h3 class="mb-4">Layanan yang banyak diakses</h3>
            <div class="row">
                <div class="col-md-3">
                    <a href="pages/pengaduan.php">
                        <img src="assets/img/pengaduan.jpg" alt="Pengaduan" class="img-fluid mb-2">
                        <p>Pengaduan Warga</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="pages/informasi.php">
                        <img src="assets/img/informasi.jpg" alt="Informasi" class="img-fluid mb-2">
                        <p>Informasi Warga</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="pages/kegiatan.php">
                        <img src="assets/img/kegiatan.jpg" alt="Kegiatan" class="img-fluid mb-2">
                        <p>Kegiatan Warga</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="pages/diskusi.php">
                        <img src="assets/img/diskusi.jpg" alt="Diskusi" class="img-fluid mb-2">
                        <p>Kolom Diskusi</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Web Pengaduan Warga</p>
    </footer>
</body>
</html> 