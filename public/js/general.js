$(function () {

  $('form').on('submit', function () {

    showLoading();

  });

});

function showLoading() {
  Swal.fire({
    title: 'Cargando...',
    text: 'Por favor, espere mientras procesamos su solicitud.',
    showConfirmButton: false,
    timer: 30000,
    timerProgressBar: true,
  });

  Swal.showLoading();
}