
$(function() {
   
   $('.table').DataTable( {
    "language": {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "_MENU_ resultados por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
},
    responsive: true,

} );

$('select').selectpicker({
  style: 'btn-default',
  width:'auto'
});

$('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });


  //var _table_w = $('table').width();
 //// var _body_w = $('.body').width();

  //if( _table_w >_body_w ){
     $.AdminBSB.leftSideBar.recuarMenu(true);
  //}

});

$(window).on( "resize", function(event){
  
 // var _table_w = $('table').width();
 // var _body_w = $( window ).width();

  //if( _table_w > _body_w ){
     $.AdminBSB.leftSideBar.recuarMenu(true);
 //}



} );



