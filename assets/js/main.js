$(document).ready(function () {
  /* Datatable */
  $('#task-table').dataTable({
    select: {
      style: 'multi'
    },
    "language": {
      "emptyTable": "Tu lista esta vacía. Añade una tarea 😁",
      "search": "Buscar",
      "info": "Mostrando _START_ hasta _END_ de _TOTAL_ tareas",
      "infoEmpty": "Mostrando 0 hasta 0 de 0 entradas",
      "paginate": {
        "next": "Siguiente",
        "previous": "Anterior"
      },
      select: {
        rows: "%d tareas marcadas"
      }
    },
    "lengthChange": false,
    dom: 'Bfrtip',
    buttons: [
      'excel', 'pdf', 'print'
    ]
  });
  /* Notificación alerta */
  $(".alert").delay(1000).slideUp(200, function () {
    $(this).alert('close');
  });
});