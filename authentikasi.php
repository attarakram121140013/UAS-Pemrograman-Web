<?php

class Authenticator {
    // Simulasikan data pengguna dari basis data

    // Metode untuk proses login
    public function login($username, $password) {
        // Periksa apakah data pengguna sesuai
        if ($password === 'uas2023') {
            // Simpan informasi pengguna dalam sesi
            $_SESSION['nama'] = $username;

            return true; // Login berhasil
        }

        return false; // Login gagal
    }

    // Metode untuk proses logout
    public function logout() {
        // Hapus semua data sesi
        session_destroy();
        return true; // Logout berhasil
    }

    // Metode untuk memeriksa apakah pengguna sudah login
    public function isLoggedIn() {
        return isset($_SESSION['nama']);
    }
}
