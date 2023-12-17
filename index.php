<?php
session_start();
include 'koneksi.php';
include 'authentikasi.php';

// Buat objek Authenticator
$autentikasi = new Authenticator();

// Periksa apakah pengguna sudah login
if (!$autentikasi->isLoggedIn()) {
    echo '<div class="info">Silakan <a href="login.php">login</a> untuk menginput data responden.</div>';
} else {
    $user_name = $_SESSION['nama'];
    echo '<div class="info">Selamat datang, User ' . $user_name . ' | <a href="logout.php">Logout</a></div>';
}

// Tampilkan pesan jika ada
if (isset($_SESSION['pesan'])) {
    echo '<div class="pesan">' . $_SESSION['pesan'] . '</div>';
    unset($_SESSION['pesan']); // Hapus pesan agar tidak ditampilkan lagi
}

// Koneksi ke database
$koneksi = koneksiDatabase();

// Fungsi untuk mendapatkan data responden
function getResponden ($koneksi, $genre = null) {
    $filter = $genre ? "WHERE genre = '$genre'" : "";
    $query = "SELECT * FROM responden $filter";
    $result = mysqli_query($koneksi, $query);

    $responden = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $responden[] = $row;
    }

    return $responden;
}

// Tampilkan data responden
$genre = isset($_GET['filter']) ? $_GET['filter'] : null;
$responden = getResponden($koneksi, $genre);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data responden</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Fungsi untuk memastikan input terisi sebelum submit
        function validateForm() {
            var nama = document.getElementById('nama').value;
            var judulAnimasi = document.getElementById('judul_animasi').value;
            var genre = document.getElementById('genre').value;
            var tahunTayang = document.getElementById('tahun_tayang').value;
            var karakterFavorit = document.getElementById('karakter_favorit').value;

            // Periksa apakah semua kolom terisi
            if (nama === '' || judulAnimasi === '' || genre === '' || tahunTayang === '' || karakterFavorit === '') {
                alert('Harap isi semua kolom sebelum submit.');
                return false;
            }

            // Jika semuanya terisi, izinkan submit
            return true;
        }
    </script>
</head>
<body>
    <br><br>

    <h1>Data Seri Animasi Favorit</h1>

    <br>
    <!-- Form tambah data -->
    <h2>Tambah responden</h2>
    <form action="tambah.php" method="POST" id="formulir" onsubmit="return validateForm()">
        <label for="nama">Nama:</label>
        <input id="nama" type="text" name="nama">
        <br>
        <label for="judul_animasi">Judul Animasi:</label>
        <input id="judul_animasi" type="text" name="judul_animasi">
        <br>
        <label for="genre">Genre:</label>
        <input id="genre" type="text" name="genre">
        <br>
        <label for="tahun_tayang">Tahun Tayang:</label>
        <input id="tahun_tayang" type="text" name="tahun_tayang">
        <br>
        <label for="karakter_favorit">Karakter Favorit:</label>
        <input id="karakter_favorit" type="text" name="karakter_favorit">
        <br>
        <input type="submit" value="Tambah">
    </form>

    <!-- Event Handler -->
    <script>
        var formulirData = document.getElementById('formulir');
        formulirData.addEventListener('submit', function(event) {
            console.log('Formulir sedang disubmit!');            
            formulirData.submit();
        });
    </script>

    <h2>Database responden</h2>

    <?php
    // Form filter
    echo '<form action="" method="GET">';
    echo '<label for="filter">Filter Genre: </label>';
    echo '<select name="filter" id="filter">';
    echo '<option value="">-- Pilih Genre --</option>';
    
    // Ambil daftar genre dari database
    $query_genre = "SELECT DISTINCT genre FROM responden";
    $result_genre = mysqli_query($koneksi, $query_genre);
    while ($row_genre = mysqli_fetch_assoc($result_genre)) {
        $selected = ($genre == $row_genre['genre']) ? 'selected' : '';
        echo "<option value='{$row_genre['genre']}' $selected>{$row_genre['genre']}</option>";
    }
    echo '</select>';
    echo '<br><br>';
    echo '<input type="submit" value="Filter">';
    echo '</form>';

    mysqli_close($koneksi);
    
    // Tampilan data responden
    if (!empty($responden)) {
        echo '<table border="1">';
        echo '<tr><th>Nama</th><th>Judul Animasi</th><th>Genre</th><th>Tahun Tayang</th><th>Karakter Favorit</th><th>Aksi</th></tr>';
        foreach ($responden as $rsp) {
            echo "<tr>
                    <td>{$rsp['nama']}</td>
                    <td>{$rsp['judul_animasi']}</td>
                    <td>{$rsp['genre']}</td>
                    <td>{$rsp['tahun_tayang']}</td>
                    <td>{$rsp['karakter_favorit']}</td>
                    <td>
                        <a href='edit.php?id={$rsp['id']}'>Edit</a> |
                        <a href='hapus.php?id={$rsp['id']}'>Hapus</a>
                    </td>
                  </tr>";
        }
        echo '</table>';
    } else {
        echo 'Tidak ada data responden.';
    }

    ?>

</body>
</html>
