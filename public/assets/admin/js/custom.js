setTimeout(function(){
   $('.alert_success').slideUp(1000);
},5000);
setTimeout(function(){
   $('.alert_error').slideUp(1000);
},10000);


// modal delete 
$(document).ready(function(){
   $(document).on("click","#softDelete",function(){
      var deleteId = $(this).data('new');
      $(".modal_body #modal_id").val(deleteId);
   });
});
