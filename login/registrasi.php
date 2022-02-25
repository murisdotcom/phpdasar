<?php  
require 'functions.php';

if ( isset($_POST["register"])){

  if ( registrasi($_POST) > 0){
    echo "<script>
            alert('User baru berhasil ditambahkan!');
          </script>";
  }else{
    echo mysqli_error($conn);
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Halaman Registrasi</title>

  <style>
    label {
      display: block;
    }
  </style>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="registrasi">
  <div class="gambar">
    <img src="../img/msglow.png" alt="">
    <h3>Halaman Registrasi</h3>
  </div>

  <div class="content">
    <form action="" method="post">
      <div class="form-group row">
        <label class="col-sm-5" for="username">Username</label>
        <div class="col-sm-7">
          <input type="text" name="username" id="username" autocomplete="off">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-5" for="password">Password</label>
        <div class="col-sm-7">
          <input type="password" name="password" id="password">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-5" for="password2">Konfirmasi Password</label>
        <div class="col-sm-7">
          <input type="password" name="password2" id="password2">
        </div>
      </div>
      <button class="btn btn-primary" type="submit" name="register">Register</button>

    </form>
  </div>
  <div class="copyright">
    <a class="btn btn-success" href="login.php">Klik disini untuk login</a>
    <br>
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