setTimeout(function(){
   $('.alert_success').slideUp(1000);
},5000);
setTimeout(function(){
   $('.alert_error').slideUp(1000);
},10000);


// modal
$(document).ready(function(){
// soft delete 
   $(document).on("click","#softDelete",function(){
      var deleteId = $(this).data('new');
      $(".modal_body #modal_id").val(deleteId);
   });
   // parmanent delete
   $(document).on("click","#delete",function(){
      var parmanentDeleteId = $(this).data('new');
      $(".delete_body #delete_id").val(parmanentDeleteId);
   });
   // restore data
   $(document).on("click","#restore",function(){
      var restoreId = $(this).data('new');
      $(".restore_body #restore_id").val(restoreId);
   });

   //datatable from bootstrap
   $('#myTable').DataTable();
   $('#allTableInfo').DataTable({
      "paging":true,
      "lengthChange":false,
      "searching":true,
      "ordering":false,
      "info":true,
      "autoWidth":false,
   });
   $('#allTableDesc').DataTable({
      "paging":true,
      "lengthChange":false,
      "searching":true,
      "ordering":false,
      "order":[[0, "desc"]],
      "info":true,
      "autoWidth":false,
   });


});

$(function(){
   $('#date').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight: true,
   });
   $('#startdate').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      todayHighlight: true,
   });
});