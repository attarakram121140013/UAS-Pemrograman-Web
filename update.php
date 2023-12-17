<?php
session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['nama'])) {
    $_SESSION['pesan'] = "Silakan login terlebih dahulu.";
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $koneksi = koneksiDatabase();

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $judul_animasi = $_POST['judul_animasi'];
    $genre = $_POST['genre'];
    $tahun_tayang = $_POST['tahun_tayang'];
    $karakter_favorit = $_POST['karakter_favorit'];

    // Update data responden berdasarkan id
    $query = "UPDATE responden SET nama = '$nama', judul_animasi = '$judul_animasi', genre = '$genre', tahun_tayang = '$tahun_tayang', karakter_favorit = '$karakter_favorit' WHERE id = '$id'";
    mysqli_query($koneksi, $query);

    mysqli_close($koneksi);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
