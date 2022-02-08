<!DOCTYPE html>
<html>
  <head>
    <title>POST</title>
  </head>
  <?php if (isset($_POST["submit"])) :?>
  <h1>Selamat datang, <?= $_POST["nama"]; ?></h1>
  <?php endif; ?>
  <body>
    <form method="post">
      <!-- Jika action & method tidak di isi maka nilai default action=ke halaman itu sendiri & methodenya berupa get -->
      Masukan nama  :
      <input type="text" name="nama">
      <button type="submit" name="submit">Kirim</button>
    </form>
  </body>
</html>