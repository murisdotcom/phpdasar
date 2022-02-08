<?php
// operator aritmatika
// +-*/%

// penggabungan string/concat
// .
// $n1=muh;
// n2=rizal;
// echo $n1 ."". $n2;

// assigment
// =, +=, -=, *=, /=, %=, .=
// $n=1;
// $n +=2;
// echo $n; hasilnya 3 karen 1+2

// perbandingan
// ==, !=
// var_dump(1=="1"); hasilnya akan true karena valuenya sama, dan tidak mengacu ke tipe datanya

// Identitas
// ===, !==
// var_dump(1==="1"); hasilnya akan False karena valuenya sama, tapi tipe datanya beda

// Logika
// && (Jika kedua nilai benar maka hasilnya true, jika salah satu nilai salah maka false)
// || (cukup satu nilai yang benar maka hasilnya true)

// for($i= 0; $i < 5; $i++){
//   echo "Hello World! <br>";
// }
// $i = 0;
// while($i<5){
// echo "Hello World! <br>";
// $i++;
// }

// $i=0;
// do {
//  echo "Hello World! <br>";
// }
// while($i<5);
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Muris.com</title>
  <style>
    .warna-baris{
      background-color: silver;
    }
  </style>
</head>
<body>
  <span><a href="latihan1.php">Latihan1</a></span>
  <span><a href="latihan2.php">Latihan2</a></span>
  <span><a href="latihan3.php">Latihan3</a></span>
  <span><a href="latihan4.php">Latihan4</a></span>
  <span><a href="login/login.php">Login</a></span>
  <h1>Belajar PHP untuk pemula</h1>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis autem eos exercitationem? Hic, laboriosam officiis. Tempora veniam accusamus consequuntur hic, aspernatur porro natus quaerat quo nostrum eaque ex dignissimos aperiam.</p>
  
  <!-- time 100 hari yang akan datang -->
  <!-- <?= date("d M Y", time()-60*60*24*100);?> -->
  
  <!-- mktime() untuk menghitung deting yang sudah berlalu terhadap tgl lahir kita-->
  <!-- parameternya ada 7, urutannya dibawah ini -->
  <!-- jam, menit, detik, bulan, tanggal, tahun -->
  <!-- <?= date("d M Y", mktime(0,0,0,4,2,1998));?> -->

  <!-- strtotime ketika input tgl lahir kita yang keluar total detik dari 1-jan-1970 -->
  <?= date("l", strtotime("25 aug 1998")); ?>
  
  <table border="1" cellpadding="10" cellspacing="0">
    <?php for($i=1; $i<=5; $i++):?>
      <?php if($i%2==1) :?>
        <tr class="warna-baris">
      <?php else : ?>
        <tr>
      <?php endif; ?>
        <?php for($j=1; $j<=7; $j++) :?>
          <td><?= "$i,$j"; ?></td>
        <?php endfor ?>
      </tr>
    <?php endfor ?>
  </table>
</body>
</html>