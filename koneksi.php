<?php

function koneksiDatabase() {
    $host = "localhost";
    $username = "id21685284_attar";
    $password = "At-12-11-40-013";
    $database = "id21685284_seri_animasi";
    
    $koneksi = mysqli_connect($host, $username, $password, $database);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $koneksi;
}
?>
