$(document).ready(function () {

  // hilangkan tombol cari
  $('#tombol-cari').hide();

  // event ketika keyword ditulis
  $('#keyword').on('keyup', function () {

    // munculkan ikon loading
    $('.loader').show();


    // ajax menggunakan load
    // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

    // ajax menggunakan get
    $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function (data) {
      $('#container').html(data);
      $('.loader').hide();
    });
  });

});