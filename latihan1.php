<?php
// Latihan 1
// array
// variabel yang dapat memiliki banyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda
// Pasangan antara key dan value
// key-nya adalah index yang dimulai dari 0

// membuat array
// cara lama
// $hari = array("Senin", "Selasa", "Rabu");

// cara baru
// $bulan = ["Januari", "Februari", "Maret"];

// Menampilkan array
// var_dump() / print_r()

// var_dump($bulan);
// echo "<br>";
// print_r($bulan);

// Menampilkan 1 elemen pada array
// echo $bulan[0];

// Menambahkan elemen baru pada array
// var_dump($bulan);
// $bulan[]="April";
// $bulan[]="Mei";
// echo "<br>";
// var_dump($bulan);

// Pengulangan pada array
// for / foreach
$angka=[2,3,1,4,2,31];
?>

<!-- Latihan 2 
array numerik-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belajar array</title>
  <style>
    .kotak{
      width:50px;
      height:50px;
      background-color:salmon;
      text-align:center;
      line-height:50px;
      margin:3px;
      float:left;
    }
    .clear{clear:both;}
  </style>
</head>
<body>
  <?php for($i=0; $i<count($angka); $i++) { ?>
  <div class="kotak"><?= $angka[$i]; ?></div>
  <?php } ?>

  <div class="clear"></div>
  
  <?php foreach($angka as $a) :?>
    <div class="kotak"><?= $a; ?></div>
    <?php endforeach; ?>

<br>
<br>
<!-- laithan 3 -->
<?php  
$mahasiswa=[
  ["Muris","130171025", "Teknik Informatika", "muris@gmail.com"],
  ["Dandi","130171026", "Teknik Informasi", "dandi@gmail.com"]
  ]
?>
<h1>Daftar Mahasiswa</h1>
<?php foreach($mahasiswa as $m) :?>
<ul>
  <li>Nama : <?= $m[0]; ?></li>
  <li>NPM : <?= $m[1]; ?></li>
  <li>Jurusan : <?= $m[2]; ?></li>
  <li>Email : <?= $m[3]; ?></li>
</ul>
<?php endforeach; ?>


<!-- Latihan 4
mencetak array multidimensi
contoh untuk menampilkan angka 5 harus menentukan 2 index, karena terdapat array di dalam array -->
<?php  
$latihan4=[
  [1,2,3],
  [4,"rizal",6],
  [7,8,9]
];
echo $latihan4[1][1];
?>
<br>
<?php foreach($latihan4 as $l) :?>
  <?php foreach($l as $m) :?>
    <div class="kotak"><?= $m; ?></div>
  <?php endforeach; ?>
  <div class="clear"></div>
<?php endforeach; ?>


<!-- latihan5 
array Associative
definisinya sama seperti array numerik, kecuali keynya adalah string yang kita buat sendiri
-->
<?php  
$latihan5=[
  [
  "nama"=>"Muris.com",
  "nrp"=>"130171025",
  "email"=>"Muris@gmail.com",
  "jurusan"=>"Teknik Informatika",
  "tugas"=>"95",
  "gambar"=>"TOKOPEDEI.PNG"
  ],
  [
  "nama"=>"dandi",
  "nrp"=>"130171026",
  "email"=>"dandi@gmail.com",
  "jurusan"=>"Teknik Informasi",
  "tugas"=>"90",
  "gambar"=>"TOKOPEDEI.PNG"
  ]
];
echo $latihan5[1]["tugas"][1];
// hasilnya akan tampil angka 80
?>

<?php foreach($latihan5 as $l5) :?>
<ul>
  <li>
    <img src="img/<?= $l5["gambar"]; ?>">
  </li>
  <li>Nama : <?= $l5["nama"]; ?></li>
  <li>NPM : <?= $l5["nrp"]; ?></li>
  <li>Jurusan : <?= $l5["email"]; ?></li>
  <li>Email : <?= $l5["jurusan"]; ?></li>
  <li>Nilai Tugas : <?= $l5["tugas"]; ?></li>
</ul>
<?php endforeach; ?>

<!-- Latihan6
Variabel Scope/ Lingkup variabel-->
<?php  
  $x=10;
  function tampilX() {
    global $x;
    echo $x;
  }
  tampilX();
?>
<br>
<!-- Latihan 7 -->
<!-- SUPERGLOBALS -->
<!-- Variabel global milik PHP -->
<!-- Merupakan array Associative -->
<!-- $_GET -->
<!-- $_POST -->
<!-- $_REQUEST -->
<!-- $_SESSION -->
<!-- $_COOKIE -->
<!-- $_SERVER -->
<!-- $_ENV -->

<?php foreach($latihan5 as $l7) :?>
  <li>
    <a href="latihan2.php?
    nama=<?= $l7["nama"]; ?>
    &nrp=<?= $l7["nrp"]; ?>
    &email=<?= $l7["email"]; ?>
    &jurusan=<?= $l7["jurusan"]; ?>
    &tugas=<?= $l7["tugas"]; ?>
    ">
    <?= $l7["nama"]; ?></a>
  </li>
<?php endforeach; ?>

</body>
</html>
