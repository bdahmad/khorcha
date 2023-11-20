

setTimeout(function(){
   $('.alert_success').slideUp(1000);
},5000);
setTimeout(function(){
   $('.alert_error').slideUp(1000);
},10000);



// modal
$(document).ready(function(){
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
      $('#enddate').datepicker({
         autoclose: true,
         format: 'yyyy-mm-dd',
         todayHighlight: true,
      });
   });
   $('#allTableAsc').DataTable({
      "paging":true,
      "lengthChange":true,
      "searching":true,
      "ordering":true,
      "order":[[0, "asc"]],
      "info":true,
      "autoWidth":false,
   });
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

   $('#allTableInfo').DataTable({
      "paging":true,
      "lengthChange":true,
      "searching":true,
      "ordering":false,
      "info":true,
      "autoWidth":false,
   });
   $('#summary').DataTable({
      "paging":false,
      "lengthChange":true,
      "searching":false,
      "ordering":true,
      "order": [[0,'asc']],
      "info":true,
      "autoWidth":false,
   });
   
   $.fn.dataTable.moment('DD/MM/YY');
   $('#example').DataTable({ 
       "order": [[ 3, "desc" ]] 
    });

   $('#allTableDesc').DataTable({
      "paging":true,
      "lengthChange":false,
      "searching":true,
      "ordering":true,
      "aaSorting": [[0,'desc']],
      "info":true,
      "autoWidth":false,
   });
   
   $('#exemple').DataTable({
      "columnDefs" : [{"targets":3, "type":"date"}],
      "order": [[ 3, "desc" ]], //or asc 
   });

   
});

