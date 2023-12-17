<?php
session_start();
include 'authentikasi.php';

// Buat objek Authentikasi
$autentikasi = new Authenticator();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan proses login menggunakan metode dari kelas Authenticator
    if ($autentikasi->login($username, $password)) {
        // Redirect ke halaman utama setelah login berhasil
        header('Location: index.php');
        exit;
    } else {
        $pesan = "Login gagal. Periksa kembali username dan password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php
    // Tampilkan pesan jika login gagal
    if (isset($pesan)) {
        echo '<p>' . $pesan . '</p>';
    }
    ?>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password: (uas2023)</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
