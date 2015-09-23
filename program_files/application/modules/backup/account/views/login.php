<?php
js(array('jquery.min.js','bootstrap.min.js')); 
?>
<div class="container-fluid">
 <div class="row" style="margin-top:10%;border:0px solid;">
  <div class="col-md-3"></div>
  <div class="col-md-6">
	 <?= form_open('','class="form-horizontal"')?>
	  <div class="form-group">
		<label for="email" class="col-sm-2 control-label" style="width:20%;border:0px solid;"><?php cur_lang('login','LEmail')?> </label>
		<div class="col-sm-10" style="max-width:50%;float:left;">
		  <?= form_input('email',set_value('email'),'class="form-control" placeholder="Email" ')?>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label" style="width:20%;border:0px solid;"><?php cur_lang('login','LLoginPass')?>  </label>
		<div class="col-sm-10" style="max-width:50%;float:left;">
		  <?=form_password('password',set_value('password'),'class="form-control" placeholder="Password" ')?>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-primary"><?php cur_lang('login','BLogin')?></button>
		  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#forgotModal" ><?php cur_lang('login','BForgot')?></button>
		</div>
		<div class="col-sm-offset-2 col-sm-10">
			<br>
			<p>
				<?php 
					cur_lang('login','announcement_register');
					echo nbs().anchor('account/register','Register');
				?>
			</p>
		</div>
		<div class="col-sm-offset-2 col-sm-10" style="color:red;">
		  <p>
		  <?php 
		  echo validation_errors();
		  if(isset($login_error))echo $login_error;
		  ?></p>
		</div>
		
	  </div>
	<?=form_close()?>
  
  </div>
  <div class="col-md-3"></div>
 </div>
</div>

<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="forgotModalLabel"><?php cur_lang('login','ForgotTitle'); ?></h4>
      </div>
		<div class="modal-body">
		  <div class="form-group">
			<label for="recipient-name" class="control-label">Email:</label>
			<input type="text" class="form-control" id="recipient-name" placeholder="email@example.com">
			<p class="result" style="padding-top:5px;"></p>
		  </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" autocomplete="off"><?php cur_lang('login','BCancel')?></button>
			<button type="button" class="btn btn-primary"  aria-pressed="false" data-loading-text="Processing..." id="sendEmail"><?php cur_lang('login','BSend')?></button>
		</div>
    </div>
  </div>
</div>
<script>
//modal
$('#forgotModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('Forgot Password')
})
//end modal
//submit form forgotModal
$('#sendEmail').on('click', function () {
    var $btn = $(this).button('loading');
	var $email = $('#recipient-name').val();
    // business logic...
	$.ajax({
	  method: "GET",
	  url: "<?=base_url('account/forgotPassword')?>",
	  data: { email: $email}
	})
	  .done(function( $msg ) {
		$('.result').html($msg);
		$btn.button('reset')
	  });
  })
</script>
</html>