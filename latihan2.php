<?php  
// cek apakah tidak ada data di $_GET
if( !isset($_GET["nama"])  ||
    !isset($_GET["nrp"])  ||
    !isset($_GET["email"])
  )
  {
  // redirect (memindahakan user dari satu halaman ke halaman lain)
  header("Location: latihan1.php");
  exit;
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>
<body>
  <ul>
    <li><img src="img/TOKOPEDEI.PNG"></li>
    <li>Nama : <?= $_GET["nama"]; ?></li>
    <li>NPM : <?= $_GET["nrp"]; ?></li>
    <li>Jurusan : <?= $_GET["jurusan"]; ?></li>
    <li>Email : <?= $_GET["email"]; ?></li>
    <li>Nilai Tugas : <?= $_GET["tugas"]; ?></li>
  </ul>
    <a href="latihan1.php">Kembali</a>
</body>
</html>