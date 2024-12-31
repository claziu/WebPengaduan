\<?php
include '../includes/header.php';

// Ambil data pengaduan dari database
include '../includes/db.php';

// Periksa koneksi database
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM pengaduan ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<section class="container py-5">
    <h2 class="mb-4">Daftar Pengaduan</h2>
    <div class="row">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <!-- Gambar -->
                        <?php $imagePath = "../uploads/" . $row['image']; ?>
                        <img src="<?php echo file_exists($imagePath) ? $imagePath : '../assets/default-image.jpg'; ?>" 
                             class="card-img-top" 
                             alt="<?php echo htmlspecialchars($row['judul']); ?>" 
                             style="height: 200px; object-fit: cover;">
                        <!-- Konten -->
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['judul']); ?></h5>
                            <p class="card-text text-muted"><?php echo date("d F Y, H:i", strtotime($row['created_at'])); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars(substr($row['deskripsi'], 0, 100)); ?>...</p>
                            <!-- Status -->
                            <?php if ($row['status'] == 'Lapor'): ?>
                                <span class="badge bg-danger">Lapor</span>
                            <?php elseif ($row['status'] == 'Dikerjakan'): ?>
                                <span class="badge bg-warning text-dark">Dikerjakan</span>
                            <?php else: ?>
                                <span class="badge bg-success">Selesai</span>
                            <?php endif; ?>
                            <!-- Tombol Detail -->
                            <a href="detail_pengaduan.php?id=<?php echo htmlspecialchars($row['id']); ?>" 
                               class="btn btn-primary btn-sm mt-2">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-muted">Belum ada pengaduan yang masuk.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
include '../includes/footer.php';
?>
