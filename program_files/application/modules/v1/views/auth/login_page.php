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
		        <form class='form_login' >
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
		            <span id="">Lupa Password? <a href="<?php echo site_url(get_link(1,'a2').'/forgot_pass') ?>" >Reset</a></span>
		          </div>
			        <a href="<?=site_url(get_link(1,'a2').'/home')?>" class="btn btn-default">Register	</a>
			        <button type="submit" class="btn btn-primary" id="login_submit" data-loading-text="Proses...">Login</button>
		        </form>
		      </div>
		 </div>
	</div>
	<!-- Registration form - END -->

</div>

