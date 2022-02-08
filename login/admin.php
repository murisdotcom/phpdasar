<?php  
session_start();
if ( !isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

// koneksi ke function
require 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerhalaman = 5;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

// tombol cari ditekan
if (isset($_POST["cari"])){
  $mahasiswa = cari($_POST["keyword"]);

}

// Ambil data dari table mahasiswa/query data mahasiswa
// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// Ambil data (fetch) mahasiswa dari objek result
// Ada 4 cara untuk mengambil data dalam lemari/tabel
// msqli_fetch_row() mengembalikan array numerik
// msqli_fetch_assoc() mengembalikan array assosiative
// msqli_fetch_array() mengembalikan array numerik & assosiativetot
// msqli_fetch_object() mengembalikan array objek
// $mahasiswa = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Halaman Admin</title>
    <style>
      .loader{
        width:100px;
        position:absolute;
        top:126px;
        z-index:-1;
        left:370px;
        display:none;
      }
    </style>
  </head>
  <body>
    <a href="logout.php">Logout</a> |
    <a href="cetak.php" target="_blank">cetak</a>
    <h1>Daftar Mahasiswa</h1>
    <br>
    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br>
    <br>
    
    <form action="" method="post">
      <input type="text" name="keyword" size="50" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off" id="keyword">
      <button type="submit" name="cari" id="tombol-cari">Cari</button>

      <img src="../img/loader.gif" class="loader">

    </form>
<br>
    <!-- navigasi -->

    <?php if( $halamanAktif > 1) :?>
      <a href="?halaman=<?=$halamanAktif-1;?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i=1; $i <= $jumlahHalaman; $i++) :?>
      <?php if($i==$halamanAktif) :?>
      <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:blue"><?= $i; ?></a>
      <?php else : ?>
      <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>
    <?php endfor;?>

    <?php if( $halamanAktif < $jumlahHalaman) :?>
      <a href="?halaman=<?=$halamanAktif+1;?>">&raquo;</a>
    <?php endif; ?>
    <br>
    <br>
    <div id="container">
      <table border="1" cellpadding="10" cellspacing="0">
        <tr>
          <th>No.</th>
          <th>Aksi</th>
          <th>Gambar</th>
          <th>NPM</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Jurusan</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach( $mahasiswa as $mhs) :?>
          <tr>
            <td><?= $i; ?></td>
            <td>
              <a href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a> |
              <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Yakin hapus ?');">Hapus</a>
            </td>
            <td>
              <img src="../img/<?= $mhs["gambar"]; ?>" width="70">
            </td>
            <td><?= $mhs["npm"]; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["email"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </table>
    </div>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>
  </body>
</html>