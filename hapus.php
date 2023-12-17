<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['nama'])) {
    $_SESSION['pesan'] = "Silakan login terlebih dahulu.";
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $koneksi = koneksiDatabase();

    $id = $_GET['id'];

    // Hapus data responden berdasarkan id
    $query = "DELETE FROM responden WHERE id = '$id'";
    mysqli_query($koneksi, $query);

    mysqli_close($koneksi);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
