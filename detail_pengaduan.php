<?php
include '../includes/header.php';
include '../includes/db.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data pengaduan berdasarkan ID
$query = "SELECT * FROM pengaduan WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<section class="container py-5">
    <h2><?php echo $row['judul']; ?></h2>
    <p class="text-muted"><?php echo date("d F Y, H:i", strtotime($row['created_at'])); ?></p>
    <img src="../uploads/<?php echo $row['image']; ?>" class="img-fluid mb-4" alt="<?php echo $row['judul']; ?>">
    <p><?php echo $row['deskripsi']; ?></p>
    <span class="badge bg-<?php echo ($row['status'] == 'Lapor') ? 'danger' : (($row['status'] == 'Dikerjakan') ? 'warning' : 'success'); ?>">
        <?php echo $row['status']; ?>
    </span>
</section>

<?php
include '../includes/footer.php';
?>
