<script>
$('#sendEmail').on('click', function () {
    var $btn = $(this).button('loading');
	var $email = $('#recipient-name').val();
    // business logic...
	$.ajax({
	  method: "GET",
	  url: "<?php echo base_url('/check_validation')?>",
	  data: { email: $email}
	})
	  .done(function( $msg ) {
		$('.result').html($msg);
		$btn.button('reset')
	  });
  })
  
 $('#useremail').on('change',function(){
	var $email=$('#useremail').val();
	$.ajax({
	  method: "GET",
	  url: "<?=base_url('account/check_validation/email')?>",
	  data: { email: $email}
	})
	  .done(function( $msg ) {
		$('#user_email_msg').html($msg);
	  });
 });
  
 $('#fullName').on('change',function(){
	var $fullName=$('#fullName').val();
	$.ajax({
	  method: "GET",
	  url: "<?=base_url('account/check_validation/fullname')?>",
	  data: { fullName: $fullName}
	})
	  .done(function( $msg ) {
		$('#fullName_msg').html($msg);
	  });
 });
  
 $('#address').on('change',function(){
	var $address=$('#address').val();
	$.ajax({
	  method: "GET",
	  url: "<?=base_url('account/check_validation/address')?>",
	  data: { address: $address}
	})
	  .done(function( $msg ) {
		$('#address_msg').html($msg);
	  });
 });
  
 $('#phoneNumber').on('keyup',function(){
	var $phoneNumber=$('#phoneNumber').val();
	if($phoneNumber !== ''){
		$('#phoneNumber_msg').html('<i class="glyphicon glyphicon-ok" style="color:green"></i>');
	}else{
		$('#phoneNumber_msg').html('<i class="glyphicon glyphicon-remove" style="color:red"></i>');
	}
	
 });
 </script>