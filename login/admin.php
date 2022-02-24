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

<!doctype html>
<html lang="en">

<head>
  <title>Halaman Admin</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">
  <style>
    .loader {
      width: 100px;
      position: absolute;
      top: 120px;
      z-index: -1;
      left: 430px;
      display: none;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="col">
      <div class="container-fluid">
        <a class="navbar-brand" href="admin.php">MS GLOW</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Daftar Reseller</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cetak.php" target="_blank">Cetak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="col">
    <div class="container-fluid">
      <h1>Daftar Reseller</h1>
      <br>
      <a class="btn btn-primary" href="tambah.php">Tambah Data Reseller</a>
      <br>
      <br>

      <form action="" method="post">
        <input type="text" name="keyword" size="50" autofocus placeholder="masukkan keyword pencarian..."
          autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="../img/loader.gif" class="loader">

      </form>
      <br>
      <!-- navigasi -->

      <?php if( $halamanAktif > 1) :?>
      <a class="btn btn-primary" href="?halaman=<?=$halamanAktif-1;?>">&laquo;</a>
      <?php endif; ?>

      <?php for($i=1; $i <= $jumlahHalaman; $i++) :?>
      <?php if($i==$halamanAktif) :?>
      <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:blue"><?= $i; ?></a>
      <?php else : ?>
      <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>
      <?php endfor;?>

      <?php if( $halamanAktif < $jumlahHalaman) :?>
      <a class="btn btn-primary" href="?halaman=<?=$halamanAktif+1;?>">&raquo;</a>
      <?php endif; ?>
      <br>
      <br>
      <div id="container">

        <table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Gambar</th>
              <th scope="col">NPM</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Jurusan</th>
              <th scope="col">#</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            <?php foreach( $mahasiswa as $mhs) :?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td>
                <img src="../img/<?= $mhs["gambar"]; ?>" width="70">
              </td>
              <td><?= $mhs["npm"]; ?></td>
              <td><?= $mhs["nama"]; ?></td>
              <td><?= $mhs["email"]; ?></td>
              <td><?= $mhs["jurusan"]; ?></td>
              <td>
                <a class="btn btn-success" href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a>
                <a class="btn btn-danger" href="hapus.php?id=<?= $mhs["id"]; ?>"
                  onclick="return confirm('Yakin hapus ?');">Hapus</a>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script> -->
</body>

</html>