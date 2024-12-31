<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include('../includes/db.php');
$notif_id = $_GET['id'];
$user_id = $_SESSION['user'];

// Tandai notifikasi sebagai dibaca
$query = "UPDATE notifikasi SET status = 'dibaca' WHERE id = '$notif_id' AND user_id = '$user_id'";

if ($conn->query($query)) {
    header('Location: dashboard.php');
} else {
    echo "Gagal menandai notifikasi sebagai dibaca.";
}
?>
