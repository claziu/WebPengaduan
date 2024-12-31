<?php
session_start();
include('../includes/db.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user'];
$query = "SELECT * FROM notifikasi WHERE user_id = '$user_id' ORDER BY tanggal DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengaduan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Dashboard Pengaduan</h1>
    <h2>Notifikasi</h2>
    <?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li><?= $row['pesan'] ?> - <?= $row['tanggal'] ?></li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Tidak ada notifikasi.</p>
    <?php endif; ?>

    <footer>
        <a href="logout.php">Logout</a>
    </footer>
</body>
</html>