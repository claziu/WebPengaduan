<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include('../includes/db.php');
$notif_id = $_GET['id'];

// Tandai notifikasi sebagai dibaca
$query = "UPDATE notifikasi SET status = 'dibaca' WHERE id = '$notif_id'";

if ($conn->query($query)) {
    header('Location: dashboard_admin.php');
} else {
    echo "Gagal menandai notifikasi sebagai dibaca.";
}
?>
