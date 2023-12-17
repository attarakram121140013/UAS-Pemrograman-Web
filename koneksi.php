<?php

function koneksiDatabase() {
    $koneksi = mysqli_connect("localhost", "id21685284_attar", "At-12-11-40-013", "id21685284_seri_animasi");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $koneksi;
}
?>
