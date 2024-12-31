<?php
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenis_pengaduan = htmlspecialchars($_POST['jenis_pengaduan']);
    $keluhan = htmlspecialchars($_POST['keluhan']);
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $foto = $_FILES['foto'];

    // Validasi file upload
    $upload_dir = 'uploads/';
    $file_name = uniqid() . '_' . basename($foto['name']);
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($foto['tmp_name'], $file_path)) {
        $stmt = $conn->prepare("INSERT INTO pengaduan (jenis_pengaduan, keluhan, lokasi, foto, status) VALUES (?, ?, ?, ?, ?)");
        $status = "Menunggu Tanggapan";
        $stmt->bind_param("sssss", $jenis_pengaduan, $keluhan, $lokasi, $file_name, $status);

        if ($stmt->execute()) {
            echo "Pengaduan berhasil dikirim!";
        } else {
            echo "Terjadi kesalahan, coba lagi.";
        }
    } else {
        echo "Gagal mengunggah foto.";
    }
}
?>