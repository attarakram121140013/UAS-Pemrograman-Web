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

    $browser = $_SERVER['HTTP_USER_AGENT'];
    $alamat_ip = $_SERVER['REMOTE_ADDR'];

    $nama = $_POST['nama'];
    $judul_animasi = $_POST['judul_animasi'];
    $genre = $_POST['genre'];
    $tahun_tayang = $_POST['tahun_tayang'];
    $karakter_favorit = $_POST['karakter_favorit'];

    // Tambahkan data responden
    $query = "INSERT INTO responden (nama, judul_animasi, genre, tahun_tayang, karakter_favorit, browser, alamat_ip) VALUES ('$nama', '$judul_animasi', '$genre', '$tahun_tayang', '$karakter_favorit', '$browser', '$alamat_ip')";
    mysqli_query($koneksi, $query);

    mysqli_close($koneksi);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
