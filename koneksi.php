<?php
function buatDatabase() {
    $koneksi = mysqli_connect("localhost", "root", "");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Buat database 'seri_animasi' jika belum ada
    $query_create_db = "CREATE DATABASE IF NOT EXISTS seri_animasi";
    if (mysqli_query($koneksi, $query_create_db)) {

    } else {
        echo "Error creating database: " . mysqli_error($koneksi) . "<br>";
    }

    mysqli_close($koneksi);
}

function buatTabelData() {
    $koneksi = mysqli_connect("localhost", "root", "", "seri_animasi");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Buat tabel 'responden' jika belum ada
    $query_create_table = "CREATE TABLE IF NOT EXISTS responden (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(50) NOT NULL,
        judul_animasi VARCHAR(255) NOT NULL,
        genre VARCHAR(50) NOT NULL,
        tahun_tayang INT (4) NOT NULL,
        karakter_favorit VARCHAR(50) NOT NULL,
        browser VARCHAR(255),
        alamat_ip VARCHAR(15)
    )";
    
    if (mysqli_query($koneksi, $query_create_table)) {

    } else {
        echo "Error creating table: " . mysqli_error($koneksi) . "<br>";
    }

    mysqli_close($koneksi);
}

function koneksiDatabase() {
    $koneksi = mysqli_connect("localhost", "root", "", "seri_animasi");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $koneksi;
}
?>
