<?php  
// untuk menampilkan gif animasi agak lambat dikit, kalo misal diupload ke sistema hapus aja usleepnya, karena akan memperlambat sistem, note : untuk usleep itu itungannya microdetik 500000= 0.5 detik, dan kalo pake sleep itungannya detik dan gabisa pake 0.5 detik, paling kecil 1detik
usleep(200000);

require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa
              WHERE
            nama LIKE '%$keyword%' OR
            npm LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
$mahasiswa = query($query);
?>

<table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th>No.</th>
      <th>Gambar</th>
      <th>NPM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    <?php foreach( $mahasiswa as $mhs) :?>
    <tr>
      <td><?= $i; ?></td>
      <td>
        <img src="../img/<?= $mhs["gambar"]; ?>" width="70">
      </td>
      <td><?= $mhs["npm"]; ?></td>
      <td><?= $mhs["nama"]; ?></td>
      <td><?= $mhs["email"]; ?></td>
      <td><?= $mhs["jurusan"]; ?></td>
      <td>
        <a class="btn btn-success" href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a>
        <a class="btn btn-danger" href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Yakin hapus ?');">Hapus</a>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  <tbody>
</table>