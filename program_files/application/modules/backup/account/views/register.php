<?php
js(array('jquery.min.js','bootstrap.min.js')); 
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid">
 <div class="row" style="margin-top:10%;border:0px solid;">
  <div class="col-md-3"></div>
  <div class="col-md-6">
	 <form role='form' class="form-horizontal" id="formRegister">
	  <div class="form-group">
		<label for="user_email" class="col-sm-2 control-label" style="width:20%;border:0px solid;"><?php cur_lang('login','LEmail')?> </label>
		<div class="col-sm-10" style="max-width:50%;float:left;">
		  <div class="input-group">
			<?=form_input(
					array(
							'type'=>'email',
							'name'=>'user_email',
							'value'=>set_value('user_email'),
							'id'=>"useremail",
							'class'=>"form-control",
							'placeholder'=>"user@example.com"))
			?>
			<span class="input-group-addon" id="user_email_msg">
			 
			</span>
		  </div>
		</div>
	  </div>
	  <div class="form-group">
		<label for="fullName" class="col-sm-2 control-label" style="width:20%;border:0px solid;"><?php cur_lang('login','LRegFullName')?> </label>
		<div class="col-sm-10" style="max-width:50%;float:left;">
		  <div class="input-group">
			<?= form_input('fullName',set_value('fullName'),'id="fullName" class="form-control" placeholder="Abdul Rohman" ')?>
			<span class="input-group-addon" id="fullName_msg">
			</span>
		  </div>
		</div>
	  </div>
	  <div class="form-group">
		<label for="address" class="col-sm-2 control-label" style="width:20%;border:0px solid;"><?php cur_lang('login','LRegAddress')?>  </label>
		<div class="col-sm-10" style="max-width:50%;float:left;">
		  <div class="input-group">
			<?=form_input('address',set_value('address'),'id="address" class="form-control" placeholder="Jl.ikan gurami Malang" ')?>
			<span class="input-group-addon" id="address_msg"></span>
		  </div>
		</div>
	  </div>
	  <div class="form-group">
		<label for="phoneNumber" class="col-sm-2 control-label" style="width:20%;border:0px solid;"><?php cur_lang('login','LRegPhoneNumber')?>  </label>
		<div class="col-sm-10" style="max-width:50%;float:left;">
		  <div class="input-group">
			<?=form_input('phoneNumber',set_value('phoneNumber'),'id="phoneNumber" class="form-control" placeholder="081200200200" ')?>
			<span class="input-group-addon" id="phoneNumber_msg"></span>
		  </div>
		  
		</div>
	  </div>
	  <div class="form-group">
		<label for="phoneNumber" class="col-sm-2 control-label" style="width:20%;border:0px solid;"></label>
		<div class="col-sm-10" style="max-width:50%;float:left;">
		  <div class="input-group">
	  		<div class="g-recaptcha" data-sitekey="6LePsAwTAAAAAHecTqxv-24kX4vaa2dwwJWqamg0"></div>
		  </div>
		  
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="button" class="btn btn-default"><?php cur_lang('login','BCancel')?></button>
		  <button type="button" class="btn btn-primary" id="submit"><?php cur_lang('login','BRegister')?></button>
		</div>
		<div class="col-sm-offset-2 col-sm-10">
			<br>
			<p>
				<?php 
					cur_lang('login','announcement_login');
					echo nbs().anchor('account/login','Login');
				?>
			</p>
		</div>
		<div class="col-sm-offset-2 col-sm-10" style="color:red;">
		  <p class="error">
		  <?php 
		  /*echo validation_errors();
		  if(isset($login_error))echo $login_error;
		  */?>
		  </p>
		</div>
		
	  </div>
	</form>
  
  </div>
  <div class="col-md-3"></div>
  <script>
	$('#submit').on('click',function(){
		var $useremail=$('#useremail').val();
		var $fullName=$('#fullName').val();
		var $address=$('#address').val();
		var $phoneNumber=$('#phoneNumber').val();
		$.ajax({
			method: "GET",
			url: "<?=base_url('account/register')?>",
			data: { 
				user_email:$useremail,
				user_fullname:$fullName,
				user_address: $address,
				user_phonenumber: $phoneNumber
			}
		}).done(function( $msg ) {
		$('.error').html($msg);
	  });
	});
  </script>
 </div>
</div>
<?php helper('functions');//memanggil helper javascript functions?>
</html>