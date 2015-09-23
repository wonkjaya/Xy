<div id="message-login-mdl">
	<!--ERROR MESSAGE-->
</div>
<div class="container">

	<div class="page-header">
		 <h1>Login</h1>
	</div>

	<!-- Registration form - START -->
	<div class="container">
		 <div class="row">
		      <div class="modal-body col-md-4">
		        <form class='form_login'>
		          <div class="form-group">
		            <label for="recipient-name" class="control-label">Email</label>
		            <input type="text" name="email" class="form-control" id="user-email">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="control-label">Password</label>
		            <input type="password" class="form-control" name="password" id="user-pass"></textarea>
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="control-label"></label>
		            <span id="">Lupa Password? <a href="<?php echo site_url($controller.'/forgot_pass') ?>" >Reset</a></span>
		          </div>
		        </form>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Register	</button>
		        <button type="button" class="btn btn-primary" id="login_submit" data-loading-text="Proses...">Login</button>
		      </div>
		 </div>
	</div>
	<!-- Registration form - END -->

</div>
<script type="text/javascript">
	$('#login_submit').click(function(){
		var $data=$('form').serialize();
		$.ajax({
	    	method : "GET",
	    	url : "<?=site_url($controller.'/login_mdl')?>",
	    	data : $data
	    }).done(function(msg){
	    	$('#message-login-mdl').html(msg);
	    	if(msg === 'sukses')document.location="<?=site_url('cpanel')?>";
	    });
	})
</script>

