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
<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Data Mahasiswa</title>
  </head>
  <body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="npm">
            NPM :
            <input type="text" name="npm" id="npm" require>
          </label>
        </li>
        <li>
          <label for="nama">
            Nama :
            <input type="text" name="nama" id="nama" require>
          </label>
        </li>
        <li>
          <label for="email">
            Email :
            <input type="text" name="email" id="email" require>
          </label>
        </li>
        <li>
          <label for="jurusan">
            Jurusan :
            <input type="text" name="jurusan" id="jurusan" require>
          </label>
        </li>
        <li>
          <label for="gambar">
            Gambar :
            <input type="file" name="gambar" id="gambar">
          </label>
        </li>
        <br>
        <button type="submit" name="submit">Tambah Data</button>
      </ul>
    </form>
  </body>
</html>