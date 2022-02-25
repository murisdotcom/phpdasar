<?php
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id'])&& isset($_COOKIE['key'])){
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT username FROM users WHERE id=$id");
  $row =mysqli_fetch_assoc($result);

  // cek cookie dan username
  if( $key === hash('sha256', $row['username'])){
    $_SESSION['login']= true;
  }
}

if ( isset($_SESSION["login"])){
  header("Location: admin.php");
  exit;
}


if (isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    // cek username
    if (mysqli_num_rows($result) === 1){

      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"])){
        // set session
        $_SESSION["login"]=true;

        // cek remember me
        if (isset($_POST['remember'])){

          // buat cookie
          setcookie('id', $row['id'], time()+60);
          setcookie('key', hash('sha256', $row['username']), time()+60);
        }

        header ("Location: admin.php");
        exit;
      }
    }
    $error = true;
  }
?>

<!doctype html>
<html lang="en">

<head>
  <title>Halaman Login</title>
  <!-- <style>
      label {
        display: block;
      }
    </style> -->
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="login">
  <div class="logo">
    <img src="../img/msglow.png" alt="">
  </div>

  <div class="content">
    <form action="" method="post">
      <div class="form-group">
        <!-- <label for="username">Username :</label> -->
        <input type="text" class="form-control" name="username" id="username" autocomplete="off"
          aria-describedby="emailHelp" placeholder="Username">
      </div>
      <div class="form-group">
        <!-- <label for="password">Password :</label> -->
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      </div>

      <?php if(isset($error)) :?>
      <p style="color: red; font-style: italic;"><b>Username / Password Salah !</b></p>
      <?php endif; ?>

      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>

      <button type="submit" class="btn btn-primary" name="login">Login</button>
    </form>
  </div>
  <div class="copyright">
    <a class="btn btn-warning" href="registrasi.php">Klik disini untuk registrasi</a>
    <br>
    <i>Copyright &copy; <?= date("Y"); ?> <b>muris.com</b></i>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>