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

    // Ambil data responden berdasarkan id
    $query = "SELECT * FROM responden WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $responden = mysqli_fetch_assoc($result);

    mysqli_close($koneksi);
} else {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data responden</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Data responden</h1>

    <!-- Form edit data -->
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $responden['id']; ?>">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $responden['nama']; ?>" required>
        <br>

        <label for="judul_animasi">Judul Animasi:</label>
        <input type="text" name="judul_animasi" value="<?php echo $responden['judul_animasi']; ?>" required>
        <br>
        
        <label for="genre">Genre:</label>
        <input type="text" name="genre" value="<?php echo $responden['genre']; ?>" required>
        <br>

        <label for="tahun_tayang">Tahun Tayang:</label>
        <input type="text" name="tahun_tayang" value="<?php echo $responden['tahun_tayang']; ?>" required>
        <br>
        
        <label for="karakter_favorit">Karakter Favorit:</label>
        <input type="text" name="karakter_favorit" value="<?php echo $responden['karakter_favorit']; ?>" required>
        <br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
