<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include('../includes/db.php');

// Ambil notifikasi untuk admin
$query = "SELECT * FROM notifikasi WHERE status = 'belum dibaca' ORDER BY tanggal DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Pengaduan Warga</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Dashboard Admin Pengaduan</h1>

    <h2>Notifikasi Baru</h2>
    <?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <p><?= $row['pesan'] ?></p>
                    <small><?= $row['tanggal'] ?></small>
                    <a href="mark_as_read_admin.php?id=<?= $row['id'] ?>">Tandai Dibaca</a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Belum ada notifikasi baru.</p>
    <?php endif; ?>

    <footer>
        <a href="logout.php">Logout</a>
    </footer>
</body>
</html>
