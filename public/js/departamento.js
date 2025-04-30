$(document).ready(function () {

  $('.data-table').DataTable({

    layout: {
      topStart: {
        buttons: [{
          extend: "copyHtml5",
          className: "btn-primary",
          text: 'Copiar',
          exportOptions: {
            columns: [0,1],
          },
        },

        {
          extend: "excelHtml5",
          className: "btn-success",
          text: 'Excel',
          exportOptions: {
            columns: [0,1],
          },
        },

        {
          extend: "csvHtml5",
          className: "btn-info",
          text: 'CSV',
          exportOptions: {
            columns: [0,1],
          },
        },

        {
          extend: "pdfHtml5",
          className: "btn-danger",
          text: 'PDF',
          exportOptions: {
            columns: [0,1],
          },
        },

        {
          extend: "print",
          className: "btn-warning",
          text: 'Imprimir',
          exportOptions: {
            columns: [0,1],
          },
        },

        ],
      }
    },

    "language": {
      "sProcessing": "<span class='fa-stack fa-lg'>\n\
			<i class='fa fa-spinner fa-spin fa-stack-2x fa-fw'></i>\n\</span>&emsp;Procesando ...",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del Inicio al Final de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de MAX registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }

    },
  });

  $('.reset').click(function () {

    window.location.href = '/departamento';

  });

});
