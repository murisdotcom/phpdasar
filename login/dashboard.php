<?php  
session_start();
if ( !isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

// koneksi ke function
require 'functions.php';

// Ambil data dari table mahasiswa/query data mahasiswa
$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");

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
      top: 125px;
      z-index: -1;
      left: 455px;
      display: none;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="col">
      <div class="collapse navbar-collapse">
        <a class="navbar-brand" href="admin.php">MS GLOW</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Daftar Reseller</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="cetak.php" target="_blank">Cetak</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
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
      <h1>Dashboard</h1>
      <br>
      <div id="container">

        <table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">No.</th>
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