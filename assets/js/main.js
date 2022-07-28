$(document).ready(function () {
  /* Datatable */
  $('#task-table').dataTable({
    "language": {
      "emptyTable": "Tu lista esta vacía. Añade una tarea 😁",
      "search": "Buscar",
      "info": "Mostrando _START_ hasta _END_ de _TOTAL_ tareas",
      "infoEmpty": "Mostrando 0 hasta 0 de 0 entradas",
      "paginate": {
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },
    "lengthChange": false
  });
/*Tachando las filas cuando son clicadas */
  $('#task-table tbody').on('click', 'tr', function () {
    $(this).toggleClass('stroke-line ');
  });

  $('#button').click(function () {
    alert(table.rows('.stroke-line').data().length + ' row(s) selected');
  });
  /* Notificación alerta */
  $(".alert").delay(1000).slideUp(200, function () {
    $(this).alert('close');
  });

  /* Tachado de texto en tarea realizada */


  /* $('#strike-task').on('click', function () {
    isChecked = $(this).is(':checked')

    if (isChecked) {
      $('td').css('text-decoration', 'line-through')
    } else {
      $('td').removeAttr('style')
    }
  }) */

});