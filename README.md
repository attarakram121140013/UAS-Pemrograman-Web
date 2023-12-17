# Bagian 1: Client-side Programming (Bobot: 30%)
1.1 (15%) Buatlah sebuah halaman web sederhana yang memanfaatkan JavaScript untuk melakukan manipulasi DOM.
Panduan:
- Buat form input dengan minimal 4 elemen input (teks, checkbox, radio, dll.)
- Menampilkan data dari server kedalam sebuah halaman menggunakan tag `table`

Keterangan:
Halaman web utama terdapat pada index.php, didalamnya terdapat formulir untuk client dapat menginputkan data yang akan dimasukkan kedalam tabel database. Formulir terdiri dari 5 inputan yaitu nama, judul animasi, genre, tahun tayang, dan karakter favorit. Data-data yang sudah diinput kemudian akan dimasukkan ke database sql yang ditampilkan pada bagian database responden.

1.2 (15%) Buatlah beberapa event untuk menghandle interaksi pada halaman web
Panduan:
- Tambahkan minimal 3 event yang berbeda untuk menghandle form pada 1.1
- Implementasikan JavaScript untuk validasi setiap input sebelum diproses oleh PHP

Keterangan:
Beberapa event yang terdapat pada halaman ini adalah tombol tambah, tombol aplikasi filter berdasarkan genre, tombol logout dan login, tombol edit, dan tombol hapus. Javascript juga sudah diterapkan untuk melakukan validasi tiap input data pada formulir sebelum kemudian diproses oleh PHP.
  
# Bagian 2: Server-side Programming (Bobot: 30%)
2.1 (20%) Implementasikan script PHP untuk mengelola data dari formulir pada Bagian 1 menggunakan variabel global seperti `$_POST` atau `$_GET`. Tampilkan hasil pengolahan data ke layar.
Panduan:
- Gunakan metode POST atau GET pada formulir.
- Parsing data dari variabel global dan lakukan validasi disisi server
- Simpan ke basisdata termasuk jenis browser dan alamat IP pengguna

Keterangan:
PHP sudah digunakan untuk mengelola data-data yang diinputkan pada formulir, tepatnya pada file tambah, hapus, dan update. Kemudian data akan disajikan dalam bentuk tabel yang dapat difilter berdasarkan genre yang dari data, rincian kode ada pada file index. Dengan demikian data yang diinputkan dapat disimpan ke database termasuk dengan browser dan ip dari pengguna.

2.2 (10%) Buatlah sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu pada halaman web Anda.
Panduan:
- Objek yang dibuat harus terkait dengan konteks pengembangan web saat ini.

Keterangan:
Implementasi OOP ada pada file authentikasi yang akan melakukan autentikasi pada saat login dan logout terjadi. Ada tiga metode yang terdapat di dalamnya yaitu fungsi login, fungsi logout, dan fungsi pengecekan login.
  
# Bagian 3: Database Management (Bobot: 20%)
3.1 (5%) Buatlah sebuah tabel pada database MySQL
Panduan:
- Lampirkan langkah-langkah dalam membuat basisdata dengan syntax basisdata

Keterangan:
Pertama akan dilakukan akses ke myphpadmin untuk kemudian membuat database baru dengan memasukkan syntax "create database" kemudian membuat tabel baru di dalam database dengan syntax "create table". Untuk rincian syntax yang digunakan pada website ini dapat dicek pada file database.sql.
  
3.2 (5%) Buatlah konfigurasi koneksi ke database MySQL pada file PHP. Pastikan koneksi berhasil dan dapat diakses.
Panduan:
- Gunakan konstanta atau variabel untuk menyimpan informasi koneksi (host, username, password, nama database).

Keterangan:
File koneksi.php bertanggung jawab dalam menghandle konektivitas antara database dengan jalannya website. File koneksi.php menjadi kunci utama file-file modifikasi database pada website ini dapat berjalan dengan baik. Koneksi.php juga membantu halaman index untuk menampilkan database yang telah tersimpan.
  
3.3 (10%) Lakukan manipulasi data pada tabel database dengan menggunakan query SQL. Misalnya, tambah data, ambil data, atau update data.
Panduan:
- Gunakan query SQL yang sesuai dengan skenario yang diberikan.
# Bagian 4: State Management (Bobot: 20%)
4.1 (10%) Buatlah skrip PHP yang menggunakan session untuk menyimpan dan mengelola state pengguna. Implementasikan logika yang memanfaatkan session.
Panduan:
- Gunakan `session_start()` untuk memulai session.
- Simpan informasi pengguna ke dalam session.
4.2 (10%) Implementasikan pengelolaan state menggunakan cookie dan browser storage pada sisi client menggunakan JavaScript.
Panduan:
- Buat fungsi-fungsi untuk menetapkan, mendapatkan, dan menghapus cookie.
- Gunakan browser storage untuk menyimpan informasi secara lokal.
# Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)
