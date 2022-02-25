<?php
session_start();
if ( !isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}

require 'functions.php'  ;
// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])){

  // cek apakah data berhasil ditambahkan atau tidak
  if ( tambah($_POST) > 0){
    echo "
        <script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'admin.php';
        </script>
        ";
  }else{
    echo "
        <script>
          alert('Data gagal ditambahkan!');
          document.location.href = 'admin.php';
        </script>
        ";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Tambah Data</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

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
              <a class="nav-link active" aria-current="page" href="admin.php">Beranda</a>
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
      <h3 style="text-align:center;">Halaman Tambah Data</h3>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group row">
          <label class="col-sm-2" for="npm">Npm</label>
          <div class="col-sm-9">
            <input class="form-control" type="text" name="npm" id="npm" autocomplete="off" require>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2" for="nama">Nama</label>
          <div class="col-sm-9">
            <input class="form-control" type="text" name="nama" id="nama" require>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2" for="email">Email</label>
          <div class="col-sm-9">
            <input class="form-control" type="text" name="email" id="email" require>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2" for="jurusan">Jurusan</label>
          <div class="col-sm-9">
            <input class="form-control" type="text" name="jurusan" id="jurusan" require>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2" for="gambar">Gambar</label>
          <div class="custom-file col-sm-9">
            <input type="file" class="custom-file-input" name="gambar" id="gambar">
            <label class="custom-file-label" for="gambar">Choose file</label>
          </div>
        </div>


        <!-- <div class="form-group row">
        <label class="col-sm-4" for="gambar">Gambar</label>
        <div class="col-sm-8">
          <input class="form-control" type="file" name="gambar" id="gambar">
        </div>
      </div> -->
        <!-- <a class="button btn btn-danger col-sm-3" href="admin.php">Cancel</a> -->
        <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>

      </form>
    </div>
  </div>
  <div class="copyright">
    <i>Copyright &copy; <?= date("Y"); ?> <b>muris.com</b></i>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>

</body>

</html>